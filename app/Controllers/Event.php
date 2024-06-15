<?php

namespace App\Controllers;

class Event extends BaseController
{
    protected $helpers = ['form'];
    protected $db, $request, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request  = \Config\Services::request();
        $this->builder  = $this->db->table('events');
    }

    public function index()
    {
        $filterArr = [
            'mendatang'             => 'ASC',
            'terbaru'               => 'DESC',
            'terlama'               => 'ASC'
        ];
        
        $likeArr = [
            'name',
            'description'
        ];
        
        $query  = $this->request->getGet('q');
        $page   = $this->request->getGet('p') == null ? 1 : (int) $this->request->getGet('p');
        $filter = $this->request->getGet('f') == null ? 'terbaru' : $this->request->getGet('f');
        $order  = $filterArr[$filter];
        $limit  = 21;
        $offset = ($page * $limit) - ($limit + ($page - 1));

        $datas = [
            'title'         => "Agenda Sekolah",
            'description'   => "",
            'keywords'      => "",
            'index'         => "index",
            'currentPage'   => "Agenda",
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

        $this->builder->select('event_id, name, description, date_start');
        
        if(!empty($query)) {
            forEach($likeArr as $like) {
                $this->builder->orLike($like, $query);
            }
        }

        if($filter == 'mendatang') {
            $now = date('Y-m-d H-i-s');

            $this->builder->where(['date_start >=' => $now]);
            $this->builder->orderBy('date_start', $order);
        } else {
            $this->builder->orderBy('date', $order);
        }
        

        $query                          = $this->builder->get($offset, $limit);
        $loop                           = count($query->getResult()) == $limit ? ($limit - 1) : count($query->getResult());
        $datas['data']['totalResults']  = count($query->getResult());

        for($i = 0; $i < $loop; $i++) {
            $datas['data']['results'][$i] = $query->getResultArray()[$i];

            $datas['data']['results'][$i]['slug'] = url_title($datas['data']['results'][$i]['name'], '-', true);
        }

        $this->db->close();

        return view('layouts/event', $datas);
        // return $this->response->setJSON($datas);
    }

    public function view($eventId, $name) {
        $this->builder->select('name, description, date_start, date_end, date');

        $query  = $this->builder->getWhere(['event_id' => $eventId]);
        $row    = $query->getRow();
        
        if($name == url_title($row->name, '-', true)) {
            $datas = [
                'title'         => $row->name,
                'description'   => $row->description,
                'keywords'      => "",
                'index'         => "index",
                'currentPage'   => null,
                'breadcrumbs'   => true,
                'prevPage'      => [
                    ["Beranda", "/"],
                    ["Agenda", "/agenda"],
                ],
                'data'          => [
                    'id'        => $eventId,
                    'result'    => $row,
                ]
            ];

            $this->db->close();
            
            return view('layouts/event-detail', $datas);
            return $this->response->setJSON($datas);
        } else {
            $this->db->close();

            return redirect()->to('agenda');
        }
    }
}