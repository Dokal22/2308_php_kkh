import pandas as pd
# 딕셔너리
data = {
    'year':[2016, 2017, 2018],
    'GDP rate': [2.8, 3.1, 3.0],
    'GDP': ['1.637M', '1.73M', '1.83M' ]
}
df = pd.DataFrame(data, index=data['year']) # index추가할 수 있음
print(df)