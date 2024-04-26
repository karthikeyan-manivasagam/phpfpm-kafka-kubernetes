# phpfpm-ngnix-kafka-kubernetes

This repo have a demo code to produce and consume a message to kafka hosted in using phpkakfa library

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
     




