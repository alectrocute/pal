wget http://nginx.org/download/nginx-1.14.1.tar.gz;
tar -zxvf nginx-1.14.1.tar.gz;
wget http://zlib.net/zlib-1.2.11.tar.gz;
tar -zxxvf zlib-1.2.11.tar.gz;
git clone https://github.com/sergey-dryabzhinsky/nginx-rtmp-module.git;
git clone https://github.com/kaltura/nginx-vod-module.git;
sudo apt-get install build-essential libpcre3 libpcre3-dev libssl-dev -y;
cd nginx-1.14.1;
./configure --add-module=../nginx-rtmp-module/ --add-module=../nginx-vod-module/ --with-file-aio --with-threads --with-zlib=../zlib-1.2.11;
sudo make;
sudo make install;

