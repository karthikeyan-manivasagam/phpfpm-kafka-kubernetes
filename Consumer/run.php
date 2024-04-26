<?php

$jwt = getenv('JWT_TOKEN');
$namespace = getenv('NAMESPACE');
$topicName = $namespace . "/" . getenv('TOPIC_NAME');

$conf = new RdKafka\Conf();
$conf->set('security.protocol', getenv('SECURITY_PROTOCOL'));
$conf->set('sasl.mechanism', getenv('SASL_MECHANISM'));
$conf->set('sasl.username', $namespace);
$conf->set('sasl.password', "token:" . $jwt);
$conf->set('bootstrap.servers', getenv('BOOTSTRAP_SERVERS'));
$conf->set('group.id', getenv('CONSUMER_GROUP_ID'));

$consumer = new RdKafka\KafkaConsumer($conf);

// Subscribe to topic 'test'
$consumer->subscribe([$topicName]);

echo "Waiting for partition assignment... (make take some time when\n";
echo "quickly re-joining the group after leaving it.)\n";

while (true) {
    $message = $consumer->consume(120 * 1000);
    switch ($message->err) {
        case RD_KAFKA_RESP_ERR_NO_ERROR:
            echo $message->payload . "\n";
            $myfile = fopen("messages.txt", "a+") or die("Unable to open file!");
            $txt = $message->payload . "\n";
            chmod("messages.txt", 0777);
            fwrite($myfile, $txt);
            fclose($myfile);
            break;
        case RD_KAFKA_RESP_ERR__PARTITION_EOF:
            echo "No more messages; will wait for more\n";
            break;
        case RD_KAFKA_RESP_ERR__TIMED_OUT:
            echo "Timed out\n";
            break;
        default:
            throw new \Exception($message->errstr(), $message->err);
            break;
    }
}
