import json

with open('logs.1777143761483.json', 'r') as f:
    data = json.load(f)

found = False
for entry in data:
    msg = entry.get('message', '')
    if 'php artisan view:cache' in msg:
        found = True
    if found:
        print(msg)
