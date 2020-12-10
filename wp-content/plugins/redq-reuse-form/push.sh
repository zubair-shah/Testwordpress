#!/bin/bash

S3_BUCKET_NAME='reuse-form'
FOLDER_NAME='./assets/src/js/reuse-form/'
#FILENAME='backup'-$(date +%-Y%-m%-d)-$(date +%-T).tar.gz

if [ "$1" == "up" ]; then
  # tar -zcvf $FILENAME $FOLDER_NAME
  # aws s3 cp $FILENAME s3://$S3_BUCKET_NAME/$FILENAME --profile bucket
  aws s3 sync $FOLDER_NAME s3://$S3_BUCKET_NAME/ --delete --profile bucket
  # rm $FILENAME
fi

if [ "$1" == "down" ]; then
  # LAST_BACKUP=`aws s3 ls s3://${S3_BUCKET_NAME} --recursive | sort | tail -n 1 | awk '{print $4}'`
  # aws s3 cp s3://$S3_BUCKET_NAME/$LAST_BACKUP $LAST_BACKUP
  # rm -rf $FOLDER_NAME
  # tar -zxvf $LAST_BACKUP
  aws s3 sync s3://$S3_BUCKET_NAME/ $FOLDER_NAME --delete --profile bucket
  #rm $LAST_BACKUP
fi
