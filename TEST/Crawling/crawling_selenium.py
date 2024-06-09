from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By

# # Chrome WebDriver의 경로를 설정합니다. 다운로드 받은 드라이버의 경로를 입력하세요.
# chrome_driver_path = "C:\\chromedriver\\chromedriver.exe"

# # Chrome 브라우저를 열기 위해 WebDriver를 초기화합니다.
# driver = webdriver.Chrome(executable_path=chrome_driver_path)
driver = webdriver.Chrome()

# 구글 홈페이지로 이동합니다.
driver.get("https://www.google.com")

# 구글 검색창을 찾아 검색어를 입력합니다.
search_box = driver.find_element(By.NAME, "q")
search_query = "OpenAI"
search_box.send_keys(search_query)
search_box.send_keys(Keys.RETURN)

# 검색 결과 페이지에서 링크를 가져옵니다.
search_results = driver.find_element(By.CSS_SELECTOR,"a")
print('start')
print(search_results)
print('end')
# 문서 읽으면서 공부해야 하나요..?
for result in search_results:
    print(result.get_attribute("href"))

# 작업이 끝나면 브라우저를 닫습니다.
driver.quit()
