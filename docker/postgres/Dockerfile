FROM postgres:9.6

RUN apt-get update \
    && apt-get install -y git gcc make bison flex libpq-dev postgresql-server-dev-9.6

RUN git clone https://github.com/postgrespro/jsquery.git \
    && cd jsquery \
    && make USE_PGXS=1 \
    && make USE_PGXS=1 install
