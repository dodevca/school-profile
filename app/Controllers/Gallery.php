<?php

namespace App\Controllers;

class Gallery extends BaseController
{
    protected $helpers = ['form'];
    protected $db, $request, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request  = \Config\Services::request();
        $this->builder  = $this->db->table('gallery');
    }

    public function index()
    {
        $filterArr = [
            'terbaru'   => 'DESC',
            'terlama'   => 'ASC'
        ];
        
        $likeArr = [
            'title'
        ];
        
        $query  = $this->request->getGet('q');
        $page   = $this->request->getGet('p') == null ? 1 : (int) $this->request->getGet('p');
        $filter = $this->request->getGet('f') == null ? 'terbaru' : $this->request->getGet('f');
        $order  = $filterArr[$filter];
        $limit  = 21;
        $offset = ($page * $limit) - ($limit + ($page - 1));

        $datas = [
            'title'         => "Galeri Sekolah",
            'description'   => "",
            'keywords'      => "",
            'index'         => "index",
            'currentPage'   => "Galeri",
            'breadcrumbs'   => true,
            'prevPage'      => [
                ["Beranda", "/"]
            ],
            'data'          => [
                'query'         => $query,
                'page'          => $page,
                'filter'        => $filter,
                'results'       => [],
                'totalResults'  => null
            ]
        ];

        $this->builder->select('album_id, title, headline, date');
        
        if(!empty($query)) {
            forEach($likeArr as $like) {
                $this->builder->orLike($like, $query);
            }
        }
        
        $this->builder->orderBy('date', $order);

        $query                          = $this->builder->get($offset, $limit);
        $loop                           = count($query->getResult()) == $limit ? ($limit - 1) : count($query->getResult());
        $datas['data']['totalResults']  = count($query->getResult());

        for($i = 0; $i < $loop; $i++) {
            $datas['data']['results'][$i] = $query->getResultArray()[$i];
            
            $datas['data']['results'][$i]['slug'] = url_title($datas['data']['results'][$i]['title'], '-', true);
        }

        $this->db->close();

        return view('layouts/gallery', $datas);
        // return $this->response->setJSON($datas);
    }

    public function view($albumId, $title) {
        $this->builder->select('title, description, headline, images, date');

        $query  = $this->builder->getWhere(['album_id' => $albumId]);
        $row    = $query->getRow();

        if($title == url_title($row->title, '-', true)) {
            $datas = [
                'title'         => $row->title,
                'description'   => $row->description,
                'keywords'      => "",
                'index'         => "index",
                'currentPage'   => null,
                'breadcrumbs'   => true,
                'prevPage'      => [
                    ["Beranda", "/"],
                    ["Galeri", "/galeri"]
                ],
                'data'          => [
                    'id'        => $albumId,
                    'result'    => $row,
                ]
            ];

            $this->db->close();
            
            return view('layouts/gallery-detail', $datas);
            // return $this->response->setJSON($datas);
        } else {
            $this->db->close();

            return redirect()->to('galeri');
        }
    }
}