<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $search     = ['Now', 'seconds', 'minutes', 'hours', 'Tomorrow', 'Yesterday', 'days', 'weeks', 'months', 'year', 'ago'];
        $replace    = ['Baru saja', 'detik', 'menit', 'jam', 'besok', 'kemarin', 'hari', 'minggu', 'bulan', 'tahun', 'yang lalu'];
        
        $datas = [
            'title'         => "SMK N 2 Kupang",
            'description'   => "",
            'keywords'      => "",
            'index'         => "index",
            'currentPage'   => "Beranda",
            'breadcrumbs'   => false,
            'prevPage'      => [],
            'data'          => [
                'news'          => [],
                'event'         => [],
                'important'     => [],
                'announcement'  => [],
                'gallery'       => [],
            ]
        ];

        $eventQuery                     = $this->db->query("SELECT event_id, name, description, date_start FROM events WHERE date_start >= now() ORDER by date_start ASC LIMIT 0, 4");
        $datas['data']['event']         = $eventQuery->getResultArray();

        $importantQuery                 = $this->db->query("SELECT announcement_id, title, content, date FROM announcements WHERE important = '1' ORDER by date DESC LIMIT 1");
        $datas['data']['important']     = $importantQuery->getResultArray();

        $announcementQuery              = $this->db->query("SELECT announcement_id, title, content, important, date FROM announcements ORDER by date DESC LIMIT 0, 3");
        $datas['data']['announcement']  = $announcementQuery->getResultArray();

        $galleryQuery                   = $this->db->query("SELECT album_id, title, headline FROM gallery ORDER by DATE DESC LIMIT 0, 5");
        $datas['data']['gallery']       = $galleryQuery->getResultArray();

        $newsQuery              = $this->db->query("SELECT news_id, title, content, image, date FROM news ORDER by date DESC LIMIT 0, 3");
        $datas['data']['news']  = $newsQuery->getResultArray();

        for($i = 0; $i < count($datas['data']['event']); $i++){
            $datas['data']['event'][$i]['slug'] = url_title($datas['data']['event'][$i]['name'], '-', true);
        }
        
        for($i = 0; $i < count($datas['data']['important']); $i++){
            $datas['data']['important'][$i]['slug'] = url_title($datas['data']['important'][$i]['title'], '-', true);
        }

        for($i = 0; $i < count($datas['data']['gallery']); $i++){
            $datas['data']['gallery'][$i]['slug'] = url_title($datas['data']['gallery'][$i]['title'], '-', true);
        }

        for($i = 0; $i < count($datas['data']['announcement']); $i++){
            $time       = Time::parse($datas['data']['announcement'][$i]['date'], 'Asia/Jakarta');

            $datas['data']['announcement'][$i]['date'] = $time->humanize();
            $datas['data']['announcement'][$i]['date'] = str_replace($search, $replace, $datas['data']['announcement'][$i]['date']);
            
            $datas['data']['announcement'][$i]['important'] = (int) $datas['data']['announcement'][$i]['important']; 
            $datas['data']['announcement'][$i]['slug']      = url_title($datas['data']['announcement'][$i]['title'], '-', true);
        }

        for($i = 0; $i < count($datas['data']['news']); $i++){
            $time       = Time::parse($datas['data']['news'][$i]['date'], 'Asia/Jakarta');

            $datas['data']['news'][$i]['date'] = $time->humanize();
            $datas['data']['news'][$i]['date'] = str_replace($search, $replace, $datas['data']['news'][$i]['date']);
            
            $datas['data']['news'][$i]['slug'] = url_title($datas['data']['news'][$i]['title'], '-', true);
        }

        $this->db->close();

        return view('layouts/homepage', $datas);
        // return $this->response->setJSON($datas);
    }

    public function greeting()
    {
        $datas = [
            'title'         => "Sambutan Kepala Sekolah",
            'description'   => "",
            'keywords'      => "",
            'index'         => "index",
            'currentPage'   => "Sambutan",
            'breadcrumbs'   => true,
            'prevPage'      => [
                ["Beranda", "/"]
            ]
        ];

        return view('layouts/greeting', $datas);
    }

    public function vision()
    {
        $datas = [
            'title'         => "Visi dan Misi Sekolah",
            'description'   => "",
            'keywords'      => "",
            'index'         => "index",
            'currentPage'   => "Visi dan Misi",
            'breadcrumbs'   => true,
            'prevPage'      => [
                ["Beranda", "/"]
            ]
        ];

        return view('layouts/vision', $datas);
    }

    public function teachers()
    {
        $datas = [
            'title'         => "Tenaga Pendidik",
            'description'   => "",
            'keywords'      => "",
            'index'         => "index",
            'currentPage'   => "Tenaga Pendidik",
            'breadcrumbs'   => true,
            'prevPage'      => [
                ["Beranda", "/"]
            ]
        ];

        return view('layouts/teachers', $datas);
    }
    
    public function infrastructure()
    {
        $datas = [
            'title'         => "Sarana dan Prasarana Sekolah",
            'description'   => "",
            'keywords'      => "",
            'index'         => "index",
            'currentPage'   => "Sarana Prasarana",
            'breadcrumbs'   => true,
            'prevPage'      => [
                ["Beranda", "/"]
            ]
        ];

        return view('layouts/infrastructure', $datas);
    }
}