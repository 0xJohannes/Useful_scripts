from multiprocessing import Pool as ThreadPool
import urllib3
import logging
import requests
requests.packages.urllib3.disable_warnings() 
http = urllib3.PoolManager()
urls = [line.rstrip('\n') for line in open('../domains')]
def reqer(url):
    try:
        stats=http.request('GET', url, timeout=1, retries=False)
        if stats.status==200:
            print(url)
    except:
        logging.info(' url did not responde {}'.format(url))
    return 

if __name__ == "__main__":
    pool = ThreadPool(100) 
    results=pool.map(reqer, urls)