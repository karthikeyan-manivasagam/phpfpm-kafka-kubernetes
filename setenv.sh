#!/bin/bash

# Load the .env file
export $(grep -v '^#' .env | xargs)

# Set Kubernetes environment variables dynamically
kubectl set env deployment/consumer-deployment SECURITY_PROTOCOL=$SECURITY_PROTOCOL \
    SASL_MECHANISM=$SASL_MECHANISM \
    JWT_TOKEN=$JWT_TOKEN \
    BOOTSTRAP_SERVERS=$BOOTSTRAP_SERVERS \
    NAMESPACE=$NAMESPACE \
    TOPIC_NAME=$TOPIC_NAME \
    CONSUMER_GROUP_ID=$CONSUMER_GROUP_ID

kubectl set env deployment/producer-deployment SECURITY_PROTOCOL=$SECURITY_PROTOCOL \
    SASL_MECHANISM=$SASL_MECHANISM \
    JWT_TOKEN=$JWT_TOKEN \
    BOOTSTRAP_SERVERS=$BOOTSTRAP_SERVERS \
    NAMESPACE=$NAMESPACE \
    TOPIC_NAME=$TOPIC_NAME \
    CONSUMER_GROUP_ID=$CONSUMER_GROUP_ID

