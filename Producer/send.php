<?php
session_start();
$jwt = getenv('JWT_TOKEN');
$namespace = getenv('NAMESPACE');
$topicName = $namespace . "/" . getenv('TOPIC_NAME');


$conf = new RdKafka\Conf();
$conf->set('security.protocol', getenv('SECURITY_PROTOCOL'));
$conf->set('sasl.mechanism', getenv('SASL_MECHANISM'));
$conf->set('sasl.username', $namespace);
$conf->set('sasl.password', "token:" . $jwt);
$conf->set('bootstrap.servers', getenv('BOOTSTRAP_SERVERS'));


$producer = new RdKafka\Producer($conf);
$topic = $producer->newTopic($topicName);
$topic->produce(RD_KAFKA_PARTITION_UA, 0, $_REQUEST['email']);
$producer->poll(0);
$result = $producer->flush(10000);

if (RD_KAFKA_RESP_ERR_NO_ERROR !== $result) {
    throw new \RuntimeException('Was unable to flush, messages might be lost!');
}
$_SESSION['message'] = "Message sent to Topic successfully View messages page to see them";
header("location:index.php");
