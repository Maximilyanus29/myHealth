FROM ubuntu:latest
LABEL authors="TEST"

ENTRYPOINT ["top", "-b"]