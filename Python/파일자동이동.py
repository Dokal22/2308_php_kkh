import os
import requests
import shutil
from bs4 import BeautifulSoup

# 크롤링할 웹 페이지 URL
url = "https://naver.com"

# 웹 페이지에 접근하여 HTML 가져오기
response = requests.get(url)
html = response.text

# BeautifulSoup을 사용하여 HTML 파싱
soup = BeautifulSoup(html, 'html.parser')

# 원하는 파일 링크의 CSS 선택자 또는 속성을 찾아서 가져옵니다.
# 예를 들어, <a> 태그의 href 속성에 있는 파일 링크를 찾는다고 가정합니다.
file_links = []
for a_tag in soup.find_all('a', href=True):
    file_link = a_tag['href']  # 파일 확장자에 따라 다운로드할 파일을 필터링할 수 있습니다.
    file_links.append(file_link)

# 파일 다운로드
download_directory = "D:/Users/kkhj3/test/"  # 다운로드한 파일을 저장할 디렉토리, 주소지정
os.makedirs(download_directory, exist_ok=True)


for file_link in file_links:
    file_url = url + file_link  # 파일의 절대 URL 생성
    file_name = os.path.basename(file_url)  # 파일 이름 추출
    file_path = os.path.join(download_directory, file_name)  # 파일 경로 생성
    
    # 파일 다운로드
    response = requests.get(file_url, stream=True)
    if response.status_code == 200:
        with open(file_path, 'wb') as file:
            response.raw.decode_content = True
            shutil.copyfileobj(response.raw, file)
        print(f"다운로드 완료: {file_name}")

print("모든 파일 다운로드 완료")