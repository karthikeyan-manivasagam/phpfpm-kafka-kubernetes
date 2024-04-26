# phpfpm-ngnix-kafka-kubernetes

This repo has the example code to run the php producer and consumer setup with kubernetes php fpm and ngnix using phprdkafka client, this cleint can also be used to connect to streamnative apache pulsar though Kafka protocol

## Steps to run in Local

Before start executing the below commands please make sure you have minikube,kubectl and set kubectl context to minikube and rename the env.default to .env and make sure all values are updated as per streamnative cluster.
    
    minikube start

    source setenv.sh
    
    Then Enter some value the form and submit

    Then navigate to http://host/consumer.php to see the messages
     




