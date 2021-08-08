# API de transações financeiras - simplificada

Este projeto propõe uma API REST que permite o acesso às operações dentro do sistema.

Recursos disponíveis para acesso via API:
* [**Autenticação**](#reference/recursos/contatos)
* [**Transações**](#reference/recursos/produtos)
* [**Carteiras**](#reference/recursos/servicos)

## Respostas

| Código | Descrição |
|---|---|
| `200` | Requisição executada com sucesso (success).|
| `401` | Recurso não autorizado.|
| `404` | Recurso ou entidade não encontrada (Not found).|

# Users [/usuarios]

### Listar (List) [GET]

+ Request (application/json)

    + Headers

        Authorization: Bearer [access_token]

+ Response 200 (application/json)

    {
    "id": 1,
    "name": "Exemplo Usuário Comum",
    "email": "exemplo1@email.com",
    "document_number": "90698491009",
    "created_at": "2021-08-01T15:34:14.000000Z",
    "updated_at": "2021-08-01T15:34:14.000000Z"
    }

+ Response 401 (application/json)

    {
        "errCode": 401,
        "errMsg": "Unauthorized."
    }

### Transaction (Create) [POST]

+ Request (application/json)

    + Headers

        Authorization: Bearer [access_token]

    + Body

        {
            "value": 12.90,
            "payer": 1,
            "payee": 2
        }

+ Response 401 (application/json)

    {
        "errCode": 401,
        "errMsg": "Unauthorized."
    }






