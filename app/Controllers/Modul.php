<?php

namespace App\Controllers;

class Modul extends BaseController
{
    protected $helpers = ['form'];
    protected $db, $request, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request  = \Config\Services::request();
        $this->builder  = $this->db->table('moduls');
    }

    public function index()
    {
        $filterArr = [
            'terbaru'   => 'DESC',
            'terlama'   => 'ASC'
        ];
        
        $likeArr = [
            'title',
            'major',
            'teacher',
            'tags'
        ];
        
        $query  = $this->request->getGet('q');
        $page   = $this->request->getGet('p') == null ? 1 : (int) $this->request->getGet('p');
        $filter = $this->request->getGet('f') == null ? 'terbaru' : $this->request->getGet('f');
        $order  = $filterArr[$filter];
        $limit  = 21;
        $offset = ($page * $limit) - ($limit + ($page - 1));

        $datas = [
            'title'         => "Modul Pembelajaran",
            'description'   => "",
            'keywords'      => "",
            'index'         => "index",
            'currentPage'   => "Modul",
            'breadcrumbs'   => true,
            'prevPage'      => [
                ["Beranda", "/"]
            ],
            'data'          => [
                'query'         => $query,
                'page'          => $page,
                'filter'        => $filter,
                'results'       => [
                    ["Beranda", "/"]
                ],
                'totalResults'  => null
            ]
        ];

        $this->builder->select('modul_id, title, major, teacher, writer, date, modul');
        
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

            $datas['data']['results'][$i]['majorSlug'] = url_title($datas['data']['results'][$i]['major'], '-', true);
        }

        $this->db->close();

        return view('layouts/modul-all', $datas);
        // return $this->response->setJSON($datas);
    }

    public function major($major)
    {
        $filterArr = [
            'terbaru'   => 'DESC',
            'terlama'   => 'ASC'
        ];
        
        $likeArr = [
            'title',
            'major',
            'teacher',
            'tags'
        ];

        $major = ucwords(preg_replace('/\s+\-/s', ' ', trim($major)));
        
        $major  = preg_replace('/\s+\-/s', ' ', trim($major));
        $query  = $this->request->getGet('q');
        $page   = $this->request->getGet('p') == null ? 1 : (int) $this->request->getGet('p');
        $filter = $this->request->getGet('f') == null ? 'terbaru' : $this->request->getGet('f');
        $order  = $filterArr[$filter];
        $limit  = 21;
        $offset = ($page * $limit) - ($limit + ($page - 1));

        $datas = [
            'title'         => ucwords($major),
            'description'   => "",
            'keywords'      => "",
            'index'         => "index",
            'currentPage'   => "Modul",
            'breadcrumbs'   => true,
            'prevPage'      => [
                ["Beranda", "/"],
                ["Modul Pembelajaran", "/modul"],
            ],
            'data'          => [
                'query'         => $query,
                'page'          => $page,
                'filter'        => $filter,
                'major'         => $major,
                'results'       => [],
                'totalResults'  => null
            ]
        ];

        $this->builder->select('modul_id, title, major, teacher, writer, date, modul');
        
        if(!empty($query)) {
            forEach($likeArr as $like) {
                $this->builder->orLike($like, $query);
            }
        }
        
        $this->builder->where(['major' => ucwords($major)]);
        $this->builder->orderBy('date', $order);

        $query                          = $this->builder->get($offset, $limit);
        $loop                           = count($query->getResult()) == $limit ? ($limit - 1) : count($query->getResult());
        $datas['data']['totalResults']  = count($query->getResult());

        for($i = 0; $i < $loop; $i++) {
            $datas['data']['results'][$i] = $query->getResultArray()[$i];
        }

        $this->db->close();

        return view('layouts/modul', $datas);
        // return $this->response->setJSON($datas);
    }
}