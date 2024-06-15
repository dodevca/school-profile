<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;

class News extends BaseController
{
    protected $helpers = ['form'];
    protected $db, $request, $builder;

    public function __construct()
    {
        $this->db       = \Config\Database::connect();
        $this->request  = \Config\Services::request();
        $this->builder  = $this->db->table('news');
    }

    public function index()
    {
        $filterArr = [
            'terbaru'   => 'DESC',
            'terlama'   => 'ASC',
        ];
        
        $likeArr = [
            'title'
        ];

        $search     = ['Now', 'seconds', 'second', 'minutes', 'minute', 'hours', 'hour', 'Tomorrow', 'Yesterday', 'days', 'day', 'weeks', 'week', 'months', 'month', 'years', 'year', 'ago'];
        $replace    = ['Baru saja', 'detik', 'detik', 'menit', 'menit', 'jam', 'jam', 'besok', 'kemarin', 'hari', 'hari', 'minggu', 'minggu', 'bulan', 'bulan', 'tahun', 'tahun', 'yang lalu'];
        
        $query  = $this->request->getGet('q');
        $page   = $this->request->getGet('p') == null ? 1 : (int) $this->request->getGet('p');
        $filter = $this->request->getGet('f') == null ? 'terbaru' : $this->request->getGet('f');
        $order  = $filterArr[$filter];
        $limit  = 21;
        $offset = ($page * $limit) - ($limit + ($page - 1));

        $datas = [
            'title'         => "Blog Sekolah",
            'description'   => "",
            'keywords'      => "",
            'index'         => "index",
            'currentPage'   => "Berita",
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

        $this->builder->select('news_id, title, content, image, date');
        
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

            $time = Time::parse($datas['data']['results'][$i]['date'], 'Asia/Jakarta');

            $datas['data']['results'][$i]['timeElapsed']    = $time->humanize();
            $datas['data']['results'][$i]['timeElapsed']    = str_replace($search, $replace, $datas['data']['results'][$i]['timeElapsed']);
            $datas['data']['results'][$i]['slug']           = url_title($datas['data']['results'][$i]['title'], '-', true);
        }

        $this->db->close();

        return view('layouts/news.php', $datas);
        // return $this->response->setJSON($datas);
    }
    
    public function view($newsId, $title) {
        $search     = ['Now', 'seconds', 'second', 'minutes', 'minute', 'hours', 'hour', 'Tomorrow', 'Yesterday', 'days', 'day', 'weeks', 'week', 'months', 'month', 'years', 'year', 'ago'];
        $replace    = ['Baru saja', 'detik', 'detik', 'menit', 'menit', 'jam', 'jam', 'besok', 'kemarin', 'hari', 'hari', 'minggu', 'minggu', 'bulan', 'bulan', 'tahun', 'tahun', 'yang lalu'];
        
        $this->builder->select('title, content, image, date');

        $query  = $this->builder->getWhere(['news_id' => $newsId]);
        $row    = $query->getRow();

        $time               = Time::parse($row->date, 'Asia/Jakarta');
        $row->timeElapsed   = $time->humanize();
        $row->timeElapsed   = str_replace($search, $replace, $row->timeElapsed);
        
        $recentQuery                = $this->db->query("SELECT news_id, title, image, date FROM news ORDER by date DESC LIMIT 0, 5");
        $recentRow                  = $recentQuery->getResultArray();
        
        for($i = 0; $i < count($recentRow); $i++){
            $time       = Time::parse($recentRow[$i]['date'], 'Asia/Jakarta');

            $recentRow[$i]['date'] = $time->humanize();
            $recentRow[$i]['date'] = str_replace($search, $replace, $recentRow[$i]['date']);
            
            $recentRow[$i]['slug'] = url_title($recentRow[$i]['title'], '-', true);
        }
        
        if($title == url_title($row->title, '-', true)) {
            $datas = [
                'title'         => $row->title,
                'description'   => "",
                'keywords'      => "",
                'index'         => "index",
                'currentPage'   => null,
                'breadcrumbs'   => true,
                'prevPage'      => [
                    ["Beranda", "/"],
                    ["Berita", "/berita"],
                ],
                'data'          => [
                    'id'        => $newsId,
                    'result'    => $row,
                    'recents'   => $recentRow
                ]
            ];

            $this->db->close();
             
            return view('layouts/news-detail.php', $datas);
            // return $this->response->setJSON($datas);
        } else {
            $this->db->close();

            return redirect()->to('berita');
        }
    }
}