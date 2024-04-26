# phpfpm-ngnix-kafka-kubernetes

This repo has the example code to run the php producer and consumer setup with kubernetes php fpm and ngnix using phprdkafka client, this cleint can also be used to connect to streamnative apache pulsar though Kafka protocol

## Steps to run in Local

Before start executing the below commands please make sure you have minikube installed and renamed the .env.default to .env and make sure all values are updated as per streamnative cluster.
    
    minikube start
    cd k8s
    kubectl apply -f ./
    cd ../source setenv.sh
    minikube service nginx-service -n default

    Then navigate to http://host/index.php to send messages

    Then Enter some value the form and submit

    Then navigate to http://host/consumer.php to see the messages
     




