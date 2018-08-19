FROM centos:7

RUN yum install haproxy openssl -y
ADD ./files/haproxy /etc/haproxy

EXPOSE 80

CMD haproxy -f /etc/haproxy/haproxy.cfg && tail -f /dev/null