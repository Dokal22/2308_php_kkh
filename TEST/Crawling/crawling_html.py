import requests
import time
import re
from bs4 import BeautifulSoup

# 웹사이트 URL
url = 'https://www.joongna.com/'
set_url = ''
# 다운 위치
path = 'D:\\'

# 저장위치
save_path = ''

# 이미지 URL 리스트
image_urls = []

# h2들
h2s_arr = []

# 크롤링 묶음
def crawling(set_url):
    # 웹사이트의 HTML 가져오기
    response = requests.get(set_url)
    html = response.content

    # BeautifulSoup 객체 생성
    soup = BeautifulSoup(html, 'html.parser')

    # image : on/off -------------------------------
    # 모든 <img> 태그 찾기
    images = soup.findAll('img')

    # 이미지 URL 추출
    for image in images:
        image_urls.append(image['src'])
    # ---------------------------------------- image

    # h2 : on/off ----------------------------------
    # 모든 <img> 태그 찾기
    # h2s = soup.findAll('h2')
    
    # # 텍스트만 가져오기(지금 태그 범벅) : <class 'bs4.element.ResultSet'> 클래스에서 get_text()로
    # count = 0
    
    # for h2 in h2s:
    #     if count < 1:
    #         count += 1
    #         continue
        
    #     h2s_arr.append(h2.get_text())
        
    # for h in h2s_arr:   
    #     with open(path + 'title_sample.txt', 'a', encoding='utf-8') as file: # 이어서 쓰려면 a
    #         file.write(h + "\n")
    # ------------------------------------------- h2
    
# 이미지 다운로드
def download_image(url, filename):
    response = requests.get(url)
    # with: 파일같은거 열고 뭐 하다가 딴데 가면 자동으로 닫아줌
    with open(path + filename, 'wb') as file:
        file.write(response.content)    

# 문자열 찾기
def get_prefix(string):
    substring = "joongna"
    index = string.find(substring)
    if index != -1:
        return string[:index] + string
    else:
        return "해당 문자열을 찾을 수 없습니다."

# url에서 파일명만 추출
def extract_filename(url):
    # 정규 표현식을 사용하여 파일 이름을 추출
    match = re.search(r'/([^/]+)$', url)
    if match:
        return match.group(1)
    else:
        return None
    
# 태그 사이 문자열 추출
def extract_string_between_tags(text, tag):
    # 정규 표현식 패턴 작성
    pattern = r"<" + tag + r">([\s\S]*?)</" + tag + r">"
    # 정규 표현식을 사용하여 매칭된 문자열 찾기
    match = re.search(pattern, text)
    if match:
        # 매칭된 부분 반환
        return match.group(1)
    else:
        # 매칭된 것이 없으면 None 반환
        return None

# 다운 묶음
def download_pack():
    # 이미지 다운로드
    for i, url in enumerate(image_urls):
        download_image(url, f'image_{int(time.time())}{i}.jpg')

# on/off ------------ 시험삼아 돌려보기: img - 여러 페이지 크롤링 ------------
# for i in range(1,5):
#     set_url = url + str(i)
#     crawling(set_url)

# image_urls에 https 붙어있는 애들만 남김
# image_urls = [a for a in image_urls if "http" in a]

# 다운
# download_pack()

# on/off ------------ 시험삼아 돌려보기: h2 ------------
# for i in range(1,5):
#     set_url = url + str(i)
#     crawling(set_url)