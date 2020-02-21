<?php
  require __DIR__ . '/vendor/autoload.php';

  $options = array(
    'encrypted' => true
  );
  $pusher = new Pusher\Pusher(
    '54af127df87f944826b6',
    '499b3628deaf0afa24d7',
    '386094',
    $options
  );

  $data['message'] = 'hello world';
  $pusher->trigger('my-channel', 'my-event', $data);
?>
