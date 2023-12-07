# import pandas as pd
# # 딕셔너리
# data = {
#     'year':[2016, 2017, 2018],
#     'GDP rate': [2.8, 3.1, 3.0],
#     'GDP': ['1.637M', '1.73M', '1.83M' ]
# }
# df = pd.DataFrame(data, index=data['year']) # index추가할 수 있음
# print(df)

import os
 
folder_path = "C:/Users/user/Downloads/업무용" # 검색할 폴더
file_list = os.listdir(folder_path)
file_count = len(file_list) #개수
print(file_count)
# 개수 확인, 주소까지 들어왔으니까
# 얘네들을 반복적으로 열고 문자열 확인하고
# 조건에 맞으면 수정하면 되는거 아닌가
# => 근데 수정을 어느거로 하는지 정해야하는데
# 파이썬이 코드 리스트를 색인하고
# 새로 들어온 애들이랑 비교해야하는데 (created > created 일케?)
# 그럼 색인 시간이 길어서 좀 늦어질 수 있는데
# 태그 리스트를 불러올 수 있는건 없나?
# 어디에 저장되어있지?