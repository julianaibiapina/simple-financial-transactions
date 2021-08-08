# API de transações financeiras - simplificada

Este projeto propõe uma API REST que permite o acesso às operações dentro do sistema.

Recursos disponíveis para acesso via API:
* Autenticação
* Usuários
* Trasações

## Respostas

| Código | Descrição |
|---|---|
| `200` | Requisição executada com sucesso (success).|
| `401` | Recurso não autorizado.|
| `404` | Recurso ou entidade não encontrada (Not found).|

# Auth [/auth]

### /login [POST]

+ Request (application/json)

    + Body

        {
            "email" : "exemplo2@email.com",
            "password" : "123456"
        }
+ Response 200 (application/json)

    {
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzljZWRhMmYwYzY4ZGMwZjE4N2I3YWNmZjMzMDg4OGFkMDIwNDA3Y2MzNDVkYTA5YjY4YjRlNTU0N2YxNzBhNDA0NTFkNDI5ODcyYTQ2YjQiLCJpYXQiOjE2MjgyOTYxMTMuMTQ1NTM4LCJuYmYiOjE2MjgyOTYxMTMuMTQ1NTQxLCJleHAiOjE2NTk4MzIxMTMuMDYyNTU2LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.KQ_sy1prBZRSPa-ICwoSlttJ3h1B-XKNVPPAaf5qCrBOaeJs0IFAmJ2ynoUrDuGTHHbPso7gopMwauBXUvpOogI0j_-liyHmJMu479Opv-FEer9W1D0HYufgCsP5nZzioEctaMUAMb3d3WdysGI8qLPNQ79bpJPxbhY2qJAUSXnZ91OdZSD-CdLW1dcI01FPAOaPCjEx5_70ult05Em9cypzmCjZx7IP3JXHUxbUrz75Pi6K9V40PMJ9dJn9hqsGkEgFyX7UzOEoQoP3cyZHld_2GUh6ifk3NS7wW1Rai74d4DjedU74eQuP58I5sFlvxeEohJdNkd5duFkd96mahDFhQ04EVSwhceDpxkl7NAvcJJrPRRHlSdXKup39HjUrpZNHcfgkKEYxqZaUZgl49p3wTUCp0e9DH0-6oChRI0kWccbuLc_K_vSQeeqdZQBckq6Vs3FX8gHVWM0nifMpWJFP-567u6aCT78rQpaEHKNxuAEFuLitaMv0z4ygcWXpyWdcASGLO5deB9Kcod9e4XTEhWSCIzwPs_Gmdr9ewI0dkqvvvSCjU4rVPesw5DW_c-4mFHUC1onO37baY6RRzJfRWH7aknrKSCz39MTJcNWa1z1KARCH6mqON3-S469riQVXsQWNRxKEhOsYS9W_3JwQJFoN5OM1egEW3HGcKJo",
        "expires_at": "2022-08-07T00:28:33.000000Z"
    }

+ Response 401 (application/json)

    {
        "message" : "Unauthorized"
    }

# Users [/users]

### /getUsers (List) [GET]

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
        "message": "Unauthorized."
    }

# Transactions [/transaction]
### /transaction (Create) [POST]

+ Request (application/json)

    + Headers

        Authorization: Bearer [access_token]

    + Body

        {
            "value": 12.90,
            "payer": 1,
            "payee": 2
        }

+ Response 200 (application/json)

    {
        "message": "sucess",
    }
+ Response 401 (application/json)

    {
        "message": "Unauthorized."
    }






