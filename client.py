from suds.client import Client


url = 'http://localhost/projetDiop/server.php?wsdl'
client = Client(url)

#status = client.service.verifUserSoap(login,mdp)

result = client.service.getUserSoap(1)
#result = client.service.getUsersSoap()
print(result)
