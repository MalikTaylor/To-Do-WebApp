from urllib import response
from matplotlib.pyplot import text, title
import requests, json

token = 'secret_Ncs97134NxmvGWSrB6TTIkvwAI4LoOZs5iCsWpNr9zj'

databaseId = 'ab5a4c918c1e426eb98e1bb801656e7a'

headers = {
    "Accept": "application/json",
    "Authorization": "Bearer " + token,
    "Content-Type": "application/json",
    "Notion-Version": "2022-06-28"
}

def getResponse(url, headers):
    res = requests.request("GET", url, headers=headers)
    return res.status_code


def readDatabase(databaseId, headers):
    notionDBUrl =  f"https://api.notion.com/v1/databases/{databaseId}/query"
    
    res = requests.request("POST", notionDBUrl, headers=headers)
    data = res.json()
    task_list_result = data['results']

    print(res.status_code)
    print(task_list_result)

    with open('./taskData.json', 'w', encoding='utf8') as f:
        json.dump(data, f, ensure_ascii=False)

    tasks = []

    for task in task_list_result:
        task_dict = mapNotionResults(task)
        tasks.append(task_dict)

    return tasks
    

def readPage(headers):
    url = 'https://www.notion.so/TLL-Scholarship-b8424735670b4d77b795a8970c84c7a4'
    res = requests.request("GET", url, headers=headers)
    print(res.status_code)
    print(res.text)
    

def createDatabase():
    pass

def updateDatabse():
    pass

def mapNotionResults(page):
    page_id = page['id']
    properties = page['properties']
   
    # Get Task Name
    pageTitlePropURL =  f"https://api.notion.com/v1/pages/{page_id}/properties/Name"
    res = requests.request("GET", pageTitlePropURL, headers=headers)
    page_data = res.json()
    name = page_data['results'][0]['title']['text']['content']

    # Get Task Completed
    pageCheckboxPropURL =  f"https://api.notion.com/v1/pages/{page_id}/properties/bdKt"
    res = requests.request("GET", pageCheckboxPropURL, headers=headers)
    page_data = res.json()
    # print('\n', page_data)
    completed = page_data['checkbox']

    #Get Task Due Date
    pageDueDatePropURL =  f"https://api.notion.com/v1/pages/{page_id}/properties/%60ZFK"
    res = requests.request("GET", pageDueDatePropURL, headers=headers)
    page_data = res.json()
    
    try:
        due_date = page_data['date']['start'] # impletemtn a try cath bcause if there is no priotirtty selected it will throw an error
    except:
        due_date = "0000-00-00"

    # Get Task Priority
    pagePriorityPropURL =  f"https://api.notion.com/v1/pages/{page_id}/properties/M%7DN%7C"
    res = requests.request("GET", pagePriorityPropURL, headers=headers)
    page_data = res.json()

    try:
        priority = page_data['select']['name'] # impletemtn a try cath bcause if there is no priotirtty selected it will throw an error
    except:
        priority = "None"
    return{
        'name': name,
        'completed' : completed,
        'due date' : due_date,
        'priority' : priority,
        'page_id' : page_id
    }
    pass

# readDatabase(databaseId, headers)
# readPage(headers)

tasks = readDatabase(databaseId, headers)
# json.dumps is used to pretty print a dictionary 
print('Movie list:', json.dumps(tasks, indent=2))