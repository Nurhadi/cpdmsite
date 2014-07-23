<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home/index";
$route['peserta/daftar'] = "peserta/daftar";
$route['peserta/upload_bukti_pembayaran'] = "peserta/upload_bukti_pembayaran";
$route['berita'] = "news/index";
$route['berita/detail/(:any)/(:num)'] = "news/detail";

# pelatihan/bimtek
$route['pelatihan/bimtek/penjelasan_program_bimtek'] = "pelatihan/penjelasan_program_bimtek";
$route['pelatihan/bimtek/kurikulum_dan_struktur_bidang'] = "pelatihan/kurikulum_dan_struktur_bidang";
$route['pelatihan/bimtek/jadwal'] = "pelatihan/jadwal";
$route['pelatihan/bimtek/fasilitas'] = "pelatihan/fasilitas";
$route['pelatihan/bimtek/peserta'] = "pelatihan/peserta";
$route['pelatihan/bimtek/evaluasi'] = "pelatihan/evaluasi";
$route['pelatihan/bimtek/sertifikat'] = "pelatihan/sertifikat";
$route['pelatihan/bimtek/informasi_penginapan'] = "pelatihan/informasi_penginapan";

# gallery/photos
$route['gallery/photos/(:any)/(:num)'] = "gallery/gallery_photo";

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */