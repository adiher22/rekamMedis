<?php 

function check_already_login() {

  $ci =& get_instance();
  $user_session = $ci->session->userdata('userid');
  if($user_session) {
  	redirect('dashboard','refresh');
  }
}

function check_not_login() {

  $ci =& get_instance();
  $user_session = $ci->session->userdata('userid');
  if(!$user_session) {
  	redirect('login','refresh');
  }
}
function indo_date($date){
  $d = substr($date, 8,2);
  $m = substr($date, 5,2);
  $y = substr($date, 0,4);

  return $d.'-'.$m.'-'.$y;
}
function indo_curency($nominal){

  $result = "Rp. " . number_format($nominal,0,',','.');
  return $result;

}
function check_admin() {
  $ci =& get_instance();
  $ci->load->library('fungsi');
  if($ci->fungsi->user_login()->level != 1 ) {
    echo "<script>alert('Akses Dilarang');</script>";
		echo "<script>window.location='".site_url()."';</script>";
  }
  function check_main() {
  $ci =& get_instance();
  $ci->load->library('fungsi');
  if($ci->fungsi->user_login()->level != 7 ) {
    redirect('block/main');
  }
}
// function check_main() {
//   $ci =& get_instance();
//   $ci->load->library('fungsi');
//   if($ci->fungsi->user_login()->level != 7 ) {
//     redirect('block/main');
//   }
// }

}
function output_json($data)
{
    $ci = get_instance();
    $data = json_encode($data);
    $ci->output->set_content_type('application/json')->set_output($data);
}
