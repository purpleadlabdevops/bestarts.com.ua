<?php
function formApply(){

  $to = 'max.globa.1990@ya.ru';
  $from = 'onyx18121990@gmail.com';

  $subject = 'Bestarts | Портрет в стилі Disney';

  // $attachments = array($_POST['images']);
  $fileAttachment = trim($_POST['images']);
  $attachments = chunk_split(base64_encode(file_get_contents($fileAttachment)));
  // $static_img = WP_CONTENT_DIR . '/uploads/2023/07/10.jpeg';
  // $attachments = array($static_img);

  $message = '
    <p>Size: '.$_POST['size'].'</p>
    <p>Count: '.$_POST['count'].'</p>
    <p>Image: '.$attachments.'</p>
  ';

  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: multipart/mixed; charset=iso-8859-1' . "\r\n";

  $send_email = wp_mail( $to, $subject, $message, $headers, $attachments);

  if( $send_email ){
    $response = [
      'status' => 'success',
      'msg' => 'Thank you! Your message was sent, we will contact you shortly.',
      'atm' => json_encode($attachments),
    ];
  } else {
    $response = [
      'status' => 'error',
      'msg' => 'Oops, Error! Something went wrong, please reload page and try againe.',
      'data' => json_encode($send_email),
      'atm' => json_encode($attachments),
    ];
  }

  echo json_encode($response);

  wp_die();
}
add_action('wp_ajax_formApply', 'formApply');
add_action('wp_ajax_nopriv_formApply', 'formApply');
