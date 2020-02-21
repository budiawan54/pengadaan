<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']                 = 'home';
$route['404_override']                       = '';
$route['translate_uri_dashes']               = FALSE;

$route['home']['get']                       = 'home/homePage';
$route['generate']['get']                       = 'home/generate';
$route['login']['get']                       = 'home/login';
$route['login']['post']                      = 'home/loginAction';

$route['logactivity']['get']                 = 'home/logActivity';
$route['logactivity']['post']                 = 'ajax/getLogActivity';


$route['profil']['get']                      = 'home/profil';
$route['profil']['post']                     = 'home/profilEdit';
$route['profil/password']['post']            = 'home/passwordUbah';

$route['/']['get']                           = 'home/index';

$route['ppk/pengajuan/tambah']['get']        = 'ppk/pengajuan/add';
$route['ppk/pengajuan/tambah/submit']        = 'ppk/pengajuan/storeAdd';
$route['ppk/pengajuan/(:num)']['get']        = 'ppk/pengajuan/detail/$1';
$route['ppk/pengajuan/(:num)/edit']['get']   = 'ppk/pengajuan/editPengajuan/$1';
$route['ppk/pengajuan/(:num)/edit']['post']   = 'ppk/pengajuan/submitEditPengajuan/$1';
$route['ppk/pengajuan']['get']               = 'ppk/pengajuan/daftarPengajuan';
$route['ppk/pengajuan/kirimkefo']['post']    = 'ppk/pengajuan/kirimKeFo/$1';
$route['ppk/pengajuan/download/lembarverifikasi/(:num)']['get']  = 'ppk/pengajuan/downloadLembarVerifikasi/$1';
$route['ppk/pengajuan/cetak/hasilpokja/(:num)']['get']               = 'ppk/pengajuan/cetakHasilPokja/$1';
$route['ppk/realisasi']['get']   			 = 'ppk/realisasi';
$route['ppk/realisasi/tambah']['get']        = 'ppk/realisasi/add';



$route['fo/pengajuan']['get']                = 'fo/pengajuan/daftarPengajuan';
$route['fo/pengajuan/cetak/']['get']         = 'fo/pengajuan/cetakPengajuan';
$route['fo/pengajuan/(:num)']['get']         = 'fo/pengajuan/detail/$1';


$route['ksb_ren/pengajuan']['get']           = 'ksb_ren/pengajuan/daftarPengajuan';
$route['ksb_ren/pengajuan/(:num)']['get']    = 'ksb_ren/pengajuan/detail/$1';
$route['ksb_ren/pengajuan/download/lembarverifikasi/(:num)']['get']  = 'ksb_ren/pengajuan/downloadLembarVerifikasi/$1';


$route['kabag_peng/pengajuan']['get']        = 'kabag_peng/pengajuan/daftarPengajuan';
$route['kabag_peng/pengajuan/(:num)']['get'] = 'kabag_peng/pengajuan/detail/$1';

$route['ksb_pel/pengajuan']['get']           = 'ksb_pel/pengajuan/daftarPengajuan';
$route['ksb_pel/pengajuan/(:num)']['get']    = 'ksb_pel/pengajuan/detail/$1';

$route['pokja/pengajuan']['get']             = 'pokja/pengajuan/daftarPengajuan';
$route['pokja/pengajuan/(:num)']['get']      = 'pokja/pengajuan/detail/$1';
$route['pokja/pengajuan/isi_catatan']['post']      = 'pokja/pengajuan/simpanCatatanPokja';

$route['anggota_pokja/pengajuan']['get']             = 'anggota_pokja/pengajuan/daftarPengajuan';
$route['anggota_pokja/pengajuan/(:num)']['get']      = 'anggota_pokja/pengajuan/detail/$1';
$route['anggota_pokja/pengajuan/isi_catatan']['post']      = 'anggota_pokja/pengajuan/simpanCatatanAnggotaPokja';



$route['monev/pengajuan']['get']             = 'monev/pengajuan/daftarPengajuan';
$route['monev/pengajuan/(:num)']['get']      = 'monev/pengajuan/detail/$1';
$route['monev/pengajuan/kirimKeKabag']['post']      = 'monev/pengajuan/kirimKeKabag';

$route['kabag/pengajuan']['get']             = 'kabag/pengajuan/daftarPengajuan';
$route['kabag/pengajuan/(:num)']['get']      = 'kabag/pengajuan/detail/$1';
$route['kabag/pengajuan/kirimKePPK']['post'] = 'kabag/pengajuan/kirimKePPK';

$route['admin/pengajuan']['get']           	= 'admin/pengajuan/daftarPengajuan';
$route['admin/pengajuan/(:num)']['get']    	= 'admin/pengajuan/detail/$1';
$route['admin/pengajuan/(:num)/hapus']['get']    	= 'admin/pengajuan/hapus/$1';
$route['admin/pengajuan/rekap']['get']    	= 'admin/pengajuan/rekap/$1';
$route['admin/pengajuan/cetakRekap']['post']        = 'admin/pengajuan/cetakRekapPengajuan';

$route['admin/manajemen/pengguna']['get']   = 'admin/pengguna/daftar';
$route['admin/manajemen/pengguna/tambah']['get']   = 'admin/pengguna/tambah';
$route['admin/manajemen/pengguna/tambah']['post']   = 'admin/pengguna/tambahStore';
$route['admin/manajemen/pengguna/(:num)']['get']   = 'admin/pengguna/detailUser/$1';
$route['admin/manajemen/pengguna/reset/(:num)']['post']   = 'admin/pengguna/resetPass/$1';
$route['admin/manajemen/pengguna/nonaktif']['post']   = 'admin/pengguna/nonAktifPengguna/$1';
$route['admin/manajemen/pengguna/aktif']['post']   = 'admin/pengguna/AktifPengguna/$1';

$route['admin/masterskpd']['get']           	= 'admin/masterskpd/daftar';
$route['admin/masterskpd/tambah']['get']        = 'admin/masterskpd/tambah';
$route['admin/masterskpd/tambah']['post']        = 'admin/masterskpd/submitTambah';
$route['admin/masterskpd/edit/(:num)']['get']        = 'admin/masterskpd/edit/$1';
$route['admin/masterskpd/edit/(:num)']['post']        = 'admin/masterskpd/editStore/$1';

$route['admin/realisasi']['get']   = 'admin/realisasi';
