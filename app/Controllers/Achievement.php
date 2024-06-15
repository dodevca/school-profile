<?php

namespace App\Controllers;

class Achievement extends BaseController
{
    protected $helpers = ['form'];
    protected $db, $request, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request  = \Config\Services::request();
        $this->builder  = $this->db->table('achievements');
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
            'title'         => "Prestasi Siswa",
            'description'   => "",
            'keywords'      => "",
            'index'         => "index",
            'currentPage'   => "Prestasi",
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

        $this->builder->select('achievement_id, type, name, major, level, year, images, date');
        
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
        }

        $this->db->close();

        return view('layouts/achievement', $datas);
        // return $this->response->setJSON($datas);
    }
}