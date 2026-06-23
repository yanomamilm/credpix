# 🚀 Introdução à API

A Bynet disponibiliza um conjunto completo de APIs RESTful utilizando o protocolo seguro **HTTPS**, oferecendo todas as ferramentas necessárias para integração.

BaseURL/Host: ```https://api-gateway.techbynet.com```

Com essa API, é possível realizar operações como:

- Criação e gerenciamento de **transações**;
- Realização de **transferências bancárias**;
- Consulta e movimentação de **saldo**;
- Cadastro e controle de **produtos**;
- Geração e personalização de **links de checkout**;
- Gerenciamento de **domínios e layouts** de checkout;
- Cadastro e consulta de contas bancárias;
- Gestão das informações de sua empresa.;
- Configuração e recebimento de **webhooks** para notificações automáticas.

Cada módulo da API oferece múltiplos endpoints com suporte para os principais métodos HTTP:

- `POST` (criar recursos)
- `GET` (consultar recursos)
- `PUT` (atualizar recursos)
- `DELETE` (remover recursos)

Além disso, existe uma seção dedicada à **criação de pedidos**, detalhando todas as etapas e endpoints que devem ser utilizados, desde a criação do produto até a finalização do pagamento.

---

:::info[Leia um relatório breve sobre as APIs da infraestrutura de pagamentos da Bynet]
Explore nossa documentação e veja como cada rota pode ser utilizada para potencializar a integração com sua plataforma.
:::

---


:::caution[]
**Versão atual da API**: `v1.1`

> Acesse a documentação completa para mais detalhes.
:::



# Create

## OpenAPI Specification

```yaml
openapi: 3.0.1
info:
  title: ''
  description: ''
  version: 1.0.0
paths:
  /api/user/transactions:
    post:
      summary: Create
      deprecated: false
      description: >-
        Este endpoint permite criar uma nova transação para o usuário
        autenticado, com todas as informações necessárias sobre pagamento,
        cliente, envio e itens da compra.



        ### ✅ Requisitos da Requisição

        - **Método HTTP**: POST  

        - **Endpoint**: /api/user/transactions  

        - **Content-Type**: application/json

        - **Autenticação:** api_token


        ### 🧠 Header da requisição


        | Campo | Tipo   | Obrigatório |
        Descrição                                     |

        |-------|--------|-------------|-----------------------------------------------|

        | `x-api-key`  | string | Sim         | Token de autenticação API Key

        | `User-Agent`  | AtivoB2B/1.0 | Sim
      tags:
        - Transactions
        - Post
        - User
        - Transactions
      parameters:
        - name: x-api-key
          in: header
          description: ''
          required: true
          example: '{Token}'
          schema:
            type: string
        - name: User-Agent
          in: header
          description: ''
          required: true
          example: AtivoB2B/1.0
          schema:
            type: string
      requestBody:
        content:
          application/json:
            schema:
              type: object
              properties:
                amount:
                  type: integer
                  x-apidog-mock: '500'
                paymentMethod:
                  type: string
                  x-apidog-mock: PIX
                customer:
                  type: object
                  properties:
                    name:
                      type: string
                      x-apidog-mock: João da Silva
                    email:
                      type: string
                      x-apidog-mock: johndoe@email.com
                    document:
                      type: object
                      properties:
                        number:
                          type: string
                          x-apidog-mock: 000.000.000-00
                        type:
                          type: string
                          x-apidog-mock: CPF
                      required:
                        - number
                        - type
                      x-apidog-orders:
                        - number
                        - type
                    phone:
                      type: string
                      x-apidog-mock: (11) 98765-4321
                    externalRef:
                      type: string
                      x-apidog-mock: string
                    address:
                      type: object
                      properties:
                        street:
                          type: string
                          x-apidog-mock: Avenida Paulista
                        streetNumber:
                          type: string
                          x-apidog-mock: '123'
                        complement:
                          type: string
                          x-apidog-mock: Apto 101
                        zipCode:
                          type: string
                          x-apidog-mock: 01000-000
                        neighborhood:
                          type: string
                          x-apidog-mock: Bela Vista
                        city:
                          type: string
                          x-apidog-mock: São Paulo
                        state:
                          type: string
                          x-apidog-mock: SP
                        country:
                          type: string
                          x-apidog-mock: BR
                      required:
                        - street
                        - streetNumber
                        - complement
                        - zipCode
                        - neighborhood
                        - city
                        - state
                        - country
                      x-apidog-orders:
                        - street
                        - streetNumber
                        - complement
                        - zipCode
                        - neighborhood
                        - city
                        - state
                        - country
                  required:
                    - name
                    - email
                    - document
                    - phone
                    - externalRef
                    - address
                  x-apidog-orders:
                    - name
                    - email
                    - document
                    - phone
                    - externalRef
                    - address
                shipping:
                  type: object
                  properties:
                    fee:
                      type: integer
                      x-apidog-mock: '500'
                    address:
                      type: object
                      properties:
                        street:
                          type: string
                          x-apidog-mock: Avenida Paulista
                        streetNumber:
                          type: string
                          x-apidog-mock: '123'
                        complement:
                          type: string
                          x-apidog-mock: Apto 101
                        zipCode:
                          type: string
                          x-apidog-mock: 01000-000
                        neighborhood:
                          type: string
                          x-apidog-mock: Bela Vista
                        city:
                          type: string
                          x-apidog-mock: São Paulo
                        state:
                          type: string
                          x-apidog-mock: SP
                        country:
                          type: string
                          x-apidog-mock: BR
                      required:
                        - street
                        - streetNumber
                        - complement
                        - zipCode
                        - neighborhood
                        - city
                        - state
                        - country
                      x-apidog-orders:
                        - street
                        - streetNumber
                        - complement
                        - zipCode
                        - neighborhood
                        - city
                        - state
                        - country
                  required:
                    - fee
                    - address
                  x-apidog-orders:
                    - fee
                    - address
                items:
                  type: array
                  items:
                    type: object
                    properties:
                      title:
                        type: string
                        x-apidog-mock: Produto XYZ
                      unitPrice:
                        type: integer
                        x-apidog-mock: '5000'
                      quantity:
                        type: integer
                        x-apidog-mock: '2'
                      tangible:
                        type: boolean
                        x-apidog-mock: 'true'
                      externalRef:
                        type: string
                        x-apidog-mock: item-12345
                    x-apidog-orders:
                      - title
                      - unitPrice
                      - quantity
                      - tangible
                      - externalRef
                pix:
                  type: object
                  properties:
                    expiresInDays:
                      type: integer
                      x-apidog-mock: '1'
                  required:
                    - expiresInDays
                  x-apidog-orders:
                    - expiresInDays
                postbackUrl:
                  type: string
                  x-apidog-mock: https://meusite.com/postback
                metadata:
                  type: string
                  x-apidog-mock: '{\"chave\":\"valor\"}'
              x-apidog-orders:
                - amount
                - paymentMethod
                - customer
                - shipping
                - items
                - pix
                - postbackUrl
                - metadata
              x-apidog-refs: {}
              required:
                - amount
                - paymentMethod
                - customer
                - items
                - pix
                - shipping
            examples: {}
      responses:
        '200':
          description: ''
          content:
            application/json:
              schema:
                type: object
                properties:
                  status:
                    type: integer
                  message:
                    type: string
                  data:
                    type: object
                    properties:
                      id:
                        type: string
                      amount:
                        type: integer
                      paymentMethod:
                        type: string
                      refundedAmount:
                        type: integer
                      installments:
                        type: 'null'
                      status:
                        type: string
                      postbackUrl:
                        type: string
                      metadata:
                        type: string
                      traceable:
                        type: boolean
                      secureId:
                        type: 'null'
                      secureUrl:
                        type: 'null'
                      paidAt:
                        type: 'null'
                      ip:
                        type: string
                      externalRef:
                        type: string
                      endToEndId:
                        type: 'null'
                      externalNsu:
                        type: 'null'
                      releaseDate:
                        type: 'null'
                      refusedReason:
                        type: 'null'
                      provider:
                        type: string
                      createdAt:
                        type: string
                      updatedAt:
                        type: string
                      gatewayId:
                        type: string
                      companyId:
                        type: string
                      customerId:
                        type: string
                      cardId:
                        type: 'null'
                      gatewayProviderId:
                        type: string
                      affiliatesId:
                        type: 'null'
                      anticipationId:
                        type: 'null'
                      gatewayDynamicPaymentMethodId:
                        type: 'null'
                      dynamicFields:
                        type: 'null'
                      returnUrl:
                        type: 'null'
                      currency:
                        type: string
                      qrCode:
                        type: 'null'
                      barcode:
                        type: 'null'
                      payUrl:
                        type: 'null'
                      webUrl:
                        type: 'null'
                      appUrl:
                        type: 'null'
                      boleto:
                        type: object
                        properties:
                          url:
                            type: string
                          barcode:
                            type: 'null'
                          digitableLine:
                            type: 'null'
                          instructions:
                            type: 'null'
                          expirationDate:
                            type: string
                        required:
                          - url
                          - barcode
                          - digitableLine
                          - instructions
                          - expirationDate
                        x-apidog-orders:
                          - url
                          - barcode
                          - digitableLine
                          - instructions
                          - expirationDate
                      card:
                        type: 'null'
                      pix:
                        type: 'null'
                      customer:
                        type: object
                        properties:
                          id:
                            type: string
                          externalRef:
                            type: string
                          name:
                            type: string
                          email:
                            type: string
                          phone:
                            type: string
                          birthdate:
                            type: 'null'
                          createdAt:
                            type: string
                          addressId:
                            type: string
                          document:
                            type: object
                            properties:
                              type:
                                type: string
                              number:
                                type: string
                            required:
                              - type
                              - number
                            x-apidog-orders:
                              - type
                              - number
                          address:
                            type: object
                            properties:
                              city:
                                type: string
                              state:
                                type: string
                              street:
                                type: string
                              country:
                                type: string
                              zipCode:
                                type: string
                              complement:
                                type: string
                              neighborhood:
                                type: string
                              streetNumber:
                                type: string
                            required:
                              - city
                              - state
                              - street
                              - country
                              - zipCode
                              - complement
                              - neighborhood
                              - streetNumber
                            x-apidog-orders:
                              - city
                              - state
                              - street
                              - country
                              - zipCode
                              - complement
                              - neighborhood
                              - streetNumber
                        required:
                          - id
                          - externalRef
                          - name
                          - email
                          - phone
                          - birthdate
                          - createdAt
                          - addressId
                          - document
                          - address
                        x-apidog-orders:
                          - id
                          - externalRef
                          - name
                          - email
                          - phone
                          - birthdate
                          - createdAt
                          - addressId
                          - document
                          - address
                      shipping:
                        type: object
                        properties:
                          fee:
                            type: integer
                          address:
                            type: object
                            properties:
                              city:
                                type: string
                              state:
                                type: string
                              street:
                                type: string
                              country:
                                type: string
                              zipCode:
                                type: string
                              complement:
                                type: string
                              neighborhood:
                                type: string
                              streetNumber:
                                type: string
                            required:
                              - city
                              - state
                              - street
                              - country
                              - zipCode
                              - complement
                              - neighborhood
                              - streetNumber
                            x-apidog-orders:
                              - city
                              - state
                              - street
                              - country
                              - zipCode
                              - complement
                              - neighborhood
                              - streetNumber
                        required:
                          - fee
                          - address
                        x-apidog-orders:
                          - fee
                          - address
                      items:
                        type: array
                        items:
                          type: object
                          properties:
                            title:
                              type: string
                            quantity:
                              type: integer
                            tangible:
                              type: boolean
                            unitPrice:
                              type: integer
                            externalRef:
                              type: string
                          x-apidog-orders:
                            - title
                            - quantity
                            - tangible
                            - unitPrice
                            - externalRef
                      delivery:
                        type: object
                        properties:
                          status:
                            type: string
                          trackingCode:
                            type: string
                          createdAt:
                            type: string
                        required:
                          - status
                          - trackingCode
                          - createdAt
                        x-apidog-orders:
                          - status
                          - trackingCode
                          - createdAt
                      fee:
                        type: object
                        properties:
                          netAmount:
                            type: integer
                          fixedAmount:
                            type: integer
                          estimatedFee:
                            type: number
                          spreadPercentage:
                            type: number
                        required:
                          - netAmount
                          - fixedAmount
                          - estimatedFee
                          - spreadPercentage
                        x-apidog-orders:
                          - netAmount
                          - fixedAmount
                          - estimatedFee
                          - spreadPercentage
                      refunds:
                        type: array
                        items:
                          type: string
                    required:
                      - id
                      - amount
                      - paymentMethod
                      - refundedAmount
                      - installments
                      - status
                      - postbackUrl
                      - metadata
                      - traceable
                      - secureId
                      - secureUrl
                      - paidAt
                      - ip
                      - externalRef
                      - endToEndId
                      - externalNsu
                      - releaseDate
                      - refusedReason
                      - provider
                      - createdAt
                      - updatedAt
                      - gatewayId
                      - companyId
                      - customerId
                      - cardId
                      - gatewayProviderId
                      - affiliatesId
                      - anticipationId
                      - gatewayDynamicPaymentMethodId
                      - dynamicFields
                      - returnUrl
                      - currency
                      - qrCode
                      - barcode
                      - payUrl
                      - webUrl
                      - appUrl
                      - boleto
                      - card
                      - pix
                      - customer
                      - shipping
                      - items
                      - delivery
                      - fee
                      - refunds
                    x-apidog-orders:
                      - id
                      - amount
                      - paymentMethod
                      - refundedAmount
                      - installments
                      - status
                      - postbackUrl
                      - metadata
                      - traceable
                      - secureId
                      - secureUrl
                      - paidAt
                      - ip
                      - externalRef
                      - endToEndId
                      - externalNsu
                      - releaseDate
                      - refusedReason
                      - provider
                      - createdAt
                      - updatedAt
                      - gatewayId
                      - companyId
                      - customerId
                      - cardId
                      - gatewayProviderId
                      - affiliatesId
                      - anticipationId
                      - gatewayDynamicPaymentMethodId
                      - dynamicFields
                      - returnUrl
                      - currency
                      - qrCode
                      - barcode
                      - payUrl
                      - webUrl
                      - appUrl
                      - boleto
                      - card
                      - pix
                      - customer
                      - shipping
                      - items
                      - delivery
                      - fee
                      - refunds
                  error:
                    type: 'null'
                required:
                  - status
                  - message
                  - data
                  - error
                x-apidog-orders:
                  - status
                  - message
                  - data
                  - error
              example:
                status: 200
                message: Transação criada com sucesso.
                data:
                  id: 2a205aaf-c409-420f-a17c-3fb7ff56e8e5
                  amount: 1000
                  paymentMethod: PIX
                  refundedAmount: 0
                  installments: null
                  status: WAITING_PAYMENT
                  postbackUrl: null
                  metadata: '{"order_number":"MT251215CD97"}'
                  traceable: false
                  secureId: null
                  secureUrl: null
                  paidAt: null
                  ip: 201.182.197.234
                  externalRef: 35b76a5b3eb242deb35bb4367f8a59b8
                  endToEndId: null
                  externalNsu: null
                  releaseDate: null
                  refusedReason: null
                  payload:
                    data:
                      ip: 201.182.197.234
                      pix:
                        expiresInDays: 1
                      items:
                        - title: Body Infantil Manga Curta
                          quantity: 1
                          tangible: true
                          unitPrice: 3990
                          externalRef: item-17
                        - title: Camisa Polo Infantil Piquet
                          quantity: 1
                          tangible: true
                          unitPrice: 9990
                          externalRef: item-18
                        - title: Frete Express
                          quantity: 1
                          tangible: false
                          unitPrice: 1499
                          externalRef: shipping
                      amount: 1000
                      customer:
                        name: Carlos Santos Rocha
                        email: souza.julia1638@outlook.com
                        phone: '91741483055'
                        address:
                          city: Ananindeua
                          state: PA
                          street: Avenida Principal
                          country: br
                          zipCode: '67015710'
                          complement: Condomínio Lago Azul
                          neighborhood: Levilândia
                          streetNumber: '101'
                        document:
                          type: CPF
                          number: '48884514860'
                        externalRef: MT251215CD97
                      metadata: '{"order_number":"MT251215CD97"}'
                      paymentMethod: PIX
                    customer:
                      id: 838d89f4-6570-4ef6-b43b-3e437013a05e
                      name: ERICK YAN CARVALHO SOUZA
                      email: erickyansp@gmail.com
                      phone: '74999633207'
                      address: null
                      document:
                        id: c3de7aac-e58e-4ed9-b81d-49a9a343fdad
                        type: CPF
                        number: '48884514860'
                        customerId: 838d89f4-6570-4ef6-b43b-3e437013a05e
                      addressId: null
                      birthdate: null
                      createdAt: '2025-09-29T18:22:41.954Z'
                      externalRef: 15e699ec-10fd-42f7-a140-2ee2cf6fddee
                    transactionId: 2a205aaf-c409-420f-a17c-3fb7ff56e8e5
                  provider: SomosSimpay
                  createdAt: '2026-02-15T14:49:24.983Z'
                  updatedAt: '2026-02-15T14:49:25.322Z'
                  gatewayId: ebb734e3-f8ef-4ef4-a6c5-f68e992fa57e
                  companyId: 5f1308f6-9fd3-4319-a023-b4742f879f4f
                  customerId: 838d89f4-6570-4ef6-b43b-3e437013a05e
                  cardId: null
                  gatewayProviderId: 07e29923-e35b-4921-b182-3874ff356c5e
                  affiliatesId: null
                  anticipationId: null
                  gatewayDynamicPaymentMethodId: null
                  dynamicFields: null
                  returnUrl: null
                  currency: BRL
                  qrCode: >-
                    00020101021226940014br.gov.bcb.pix2572qrcode.somossimpay.com.br/v2/qr/cob/35b76a5b-3eb2-42de-b35b-b4367f8a59b85204000053039865802BR5925WF
                    INTERMEDIACAO LTDA  ME6009SAO PAULO62070503***630439BA
                  barcode: null
                  payUrl: null
                  webUrl: null
                  appUrl: null
                  source: API
                  boleto: null
                  card: null
                  pix:
                    qrcode: >-
                      00020101021226940014br.gov.bcb.pix2572qrcode.somossimpay.com.br/v2/qr/cob/35b76a5b-3eb2-42de-b35b-b4367f8a59b85204000053039865802BR5925WF
                      INTERMEDIACAO LTDA  ME6009SAO PAULO62070503***630439BA
                    url: null
                    expirationDate: '2026-02-15T15:49:25.159Z'
                  customer:
                    id: 838d89f4-6570-4ef6-b43b-3e437013a05e
                    externalRef: 15e699ec-10fd-42f7-a140-2ee2cf6fddee
                    name: ERICK YAN CARVALHO SOUZA
                    email: erickyansp@gmail.com
                    phone: '74999633207'
                    birthdate: null
                    createdAt: '2025-09-29T18:22:41.954Z'
                    addressId: null
                    document:
                      type: CPF
                      number: '48884514860'
                    address: null
                  shipping: null
                  items:
                    - title: Body Infantil Manga Curta
                      quantity: 1
                      tangible: true
                      unitPrice: 3990
                      externalRef: item-17
                    - title: Camisa Polo Infantil Piquet
                      quantity: 1
                      tangible: true
                      unitPrice: 9990
                      externalRef: item-18
                    - title: Frete Express
                      quantity: 1
                      tangible: false
                      unitPrice: 1499
                      externalRef: shipping
                  delivery: null
                  fee:
                    netAmount: 760
                    fixedAmount: 190
                    estimatedFee: 240
                    spreadPercentage: 5
                  refunds: []
                error: null
          headers: {}
          x-apidog-name: Success
        '400':
          description: ''
          content:
            application/json:
              schema:
                type: object
                properties:
                  message:
                    type: string
                    x-apidog-mock: >-
                      Os dados enviados são inválidos. Verifique os campos e
                      tente novamente.
                    default: >-
                      Os dados enviados são inválidos. Verifique os campos e
                      tente novamente.
                  data:
                    type: 'null'
                  status:
                    type: number
                    x-apidog-mock: '400'
                    default: 400
                  error:
                    type: 'null'
                x-apidog-orders:
                  - message
                  - data
                  - status
                  - error
                required:
                  - message
                  - data
                  - status
                  - error
          headers: {}
          x-apidog-name: Bad Request
        '401':
          description: ''
          content:
            application/json:
              schema:
                type: object
                properties:
                  message:
                    type: string
                    x-apidog-mock: Unauthorized
                    default: Unauthorized
                  data:
                    type: 'null'
                  status:
                    type: number
                    x-apidog-mock: '401'
                    default: 401
                  error:
                    type: 'null'
                x-apidog-orders:
                  - message
                  - data
                  - status
                  - error
                required:
                  - message
                  - data
                  - status
                  - error
          headers: {}
          x-apidog-name: Unauthorized
        '403':
          description: ''
          content:
            application/json:
              schema:
                type: object
                properties:
                  message:
                    type: string
                    x-apidog-mock: Forbidden
                    default: Forbidden
                  data:
                    type: 'null'
                  status:
                    type: number
                    x-apidog-mock: '401'
                    default: 403
                  error:
                    type: 'null'
                x-apidog-orders:
                  - message
                  - data
                  - status
                  - error
                required:
                  - message
                  - data
                  - status
                  - error
          headers: {}
          x-apidog-name: Forbidden
        '404':
          description: ''
          content:
            application/json:
              schema:
                type: object
                properties:
                  message:
                    type: string
                    x-apidog-mock: Informação não encontrada
                    default: Informação não encontrada
                  data:
                    type: 'null'
                  status:
                    type: number
                    x-apidog-mock: '404'
                    default: 404
                  error:
                    type: 'null'
                x-apidog-orders:
                  - message
                  - data
                  - status
                  - error
                required:
                  - message
                  - data
                  - status
                  - error
          headers: {}
          x-apidog-name: Not Found
      security: []
      x-apidog-folder: Transactions
      x-apidog-status: released
      x-run-in-apidog: https://app.apidog.com/web/project/1013340/apis/api-19470492-run
components:
  schemas: {}
  securitySchemes: {}
servers: []
security: []

```

# Find by ID

## OpenAPI Specification

```yaml
openapi: 3.0.1
info:
  title: ''
  description: ''
  version: 1.0.0
paths:
  /api/user/transactions/{id}:
    get:
      summary: Find by ID
      deprecated: false
      description: >
        Este endpoint permite recuperar os detalhes de um webhook específico, a
        partir do seu identificador único (`id`).



        ### ✅ Requisitos da Requisição

        - **Método HTTP**: `GET`  

        - **Endpoint**: `/api/user/transactions/{id}`  

        - **Content-Type**: `application/json`

        - **Autenticação:** `api_token`


        ### 🧠 Header da requisição


        | Campo | Tipo   | Obrigatório |
        Descrição                                     |

        |-------|--------|-------------|-----------------------------------------------|

        | `x-api-key`  | string | Sim         | Token de autenticação API Key 

        | `User-Agent`  | AtivoB2B/1.0 | Sim



        ### 📥 Parâmetros obrigatórios


        **Na URL (path param):**

        - `id` —  Identificador único da transação
      tags:
        - Transactions
        - Get
        - User
        - Transactions
      parameters:
        - name: id
          in: path
          description: ''
          required: true
          example: f8f6f8h9trgdfgdf9gf5g65d43asd
          schema:
            type: string
            examples:
              - f8f6f8h9trgdfgdf9gf5g65d43asd
        - name: x-api-key
          in: header
          description: ''
          required: true
          example: '{Token}'
          schema:
            type: string
        - name: User-Agent
          in: header
          description: ''
          required: true
          example: AtivoB2B/1.0
          schema:
            type: string
      responses:
        '200':
          description: ''
          content:
            application/json:
              schema:
                type: object
                properties:
                  status:
                    type: integer
                  message:
                    type: string
                  data:
                    type: object
                    properties:
                      id:
                        type: string
                      amount:
                        type: integer
                      refundedAmount:
                        type: integer
                      companyId:
                        type: string
                      installments:
                        type: 'null'
                      paymentMethod:
                        type: string
                      status:
                        type: string
                      postbackUrl:
                        type: 'null'
                      metadata:
                        type: string
                      traceable:
                        type: boolean
                      secureId:
                        type: 'null'
                      secureUrl:
                        type: 'null'
                      createdAt:
                        type: string
                      updatedAt:
                        type: string
                      paidAt:
                        type: 'null'
                      ip:
                        type: string
                      externalRef:
                        type: string
                      customer:
                        type: object
                        properties:
                          document:
                            type: object
                            properties:
                              id:
                                type: string
                              number:
                                type: string
                              type:
                                type: string
                              customerId:
                                type: string
                            required:
                              - id
                              - number
                              - type
                              - customerId
                            x-apidog-orders:
                              - id
                              - number
                              - type
                              - customerId
                          address:
                            type: object
                            properties:
                              id:
                                type: string
                              street:
                                type: string
                              streetNumber:
                                type: string
                              complement:
                                type: string
                              zipCode:
                                type: string
                              neighborhood:
                                type: string
                              city:
                                type: string
                              state:
                                type: string
                              country:
                                type: string
                            required:
                              - id
                              - street
                              - streetNumber
                              - complement
                              - zipCode
                              - neighborhood
                              - city
                              - state
                              - country
                            x-apidog-orders:
                              - id
                              - street
                              - streetNumber
                              - complement
                              - zipCode
                              - neighborhood
                              - city
                              - state
                              - country
                        required:
                          - document
                          - address
                        x-apidog-orders:
                          - document
                          - address
                      card:
                        type: 'null'
                      boleto:
                        type: 'null'
                      pix:
                        type: 'null'
                      shipping:
                        type: object
                        properties:
                          id:
                            type: string
                          fee:
                            type: integer
                          addressId:
                            type: string
                          transactionId:
                            type: string
                        required:
                          - id
                          - fee
                          - addressId
                          - transactionId
                        x-apidog-orders:
                          - id
                          - fee
                          - addressId
                          - transactionId
                      refusedReason:
                        type: string
                      items:
                        type: array
                        items:
                          type: object
                          properties:
                            id:
                              type: string
                            externalRef:
                              type: string
                            title:
                              type: string
                            unitPrice:
                              type: integer
                            quantity:
                              type: integer
                            tangible:
                              type: boolean
                            transactionId:
                              type: string
                          x-apidog-orders:
                            - id
                            - externalRef
                            - title
                            - unitPrice
                            - quantity
                            - tangible
                            - transactionId
                      refunds:
                        type: array
                        items:
                          type: string
                      delivery:
                        type: 'null'
                      fee:
                        type: object
                        properties:
                          id:
                            type: string
                          fixedAmount:
                            type: integer
                          spreadPercentage:
                            type: number
                          estimatedFee:
                            type: number
                          netAmount:
                            type: integer
                          transactionId:
                            type: string
                          gatewayId:
                            type: string
                        required:
                          - id
                          - fixedAmount
                          - spreadPercentage
                          - estimatedFee
                          - netAmount
                          - transactionId
                          - gatewayId
                        x-apidog-orders:
                          - id
                          - fixedAmount
                          - spreadPercentage
                          - estimatedFee
                          - netAmount
                          - transactionId
                          - gatewayId
                      qrCode:
                        type: 'null'
                      barcode:
                        type: 'null'
                      payUrl:
                        type: 'null'
                      webUrl:
                        type: 'null'
                      appUrl:
                        type: 'null'
                    required:
                      - id
                      - amount
                      - refundedAmount
                      - companyId
                      - installments
                      - paymentMethod
                      - status
                      - postbackUrl
                      - metadata
                      - traceable
                      - secureId
                      - secureUrl
                      - createdAt
                      - updatedAt
                      - paidAt
                      - ip
                      - externalRef
                      - customer
                      - card
                      - boleto
                      - pix
                      - shipping
                      - refusedReason
                      - items
                      - refunds
                      - delivery
                      - fee
                      - qrCode
                      - barcode
                      - payUrl
                      - webUrl
                      - appUrl
                    x-apidog-orders:
                      - id
                      - amount
                      - refundedAmount
                      - companyId
                      - installments
                      - paymentMethod
                      - status
                      - postbackUrl
                      - metadata
                      - traceable
                      - secureId
                      - secureUrl
                      - createdAt
                      - updatedAt
                      - paidAt
                      - ip
                      - externalRef
                      - customer
                      - card
                      - boleto
                      - pix
                      - shipping
                      - refusedReason
                      - items
                      - refunds
                      - delivery
                      - fee
                      - qrCode
                      - barcode
                      - payUrl
                      - webUrl
                      - appUrl
                  error:
                    type: 'null'
                required:
                  - status
                  - message
                  - data
                  - error
                x-apidog-orders:
                  - status
                  - message
                  - data
                  - error
              example:
                status: 200
                message: Transação encontrada com sucesso.
                data:
                  id: 00000000-0000-0000-0000-0000000000000
                  amount: 10
                  refundedAmount: 0
                  companyId: 00000000-0000-0000-0000-0000000000000
                  installments: null
                  paymentMethod: PIX
                  status: REFUSED
                  postbackUrl: null
                  metadata: >-
                    {"linkId":"00000000-0000-0000-0000-0000000000000","sellerId":"00000000-0000-0000-0000-0000000000000","orderId":"00000000-0000-0000-0000-0000000000000","gatewayId":"00000000-0000-0000-0000-0000000000000"}
                  traceable: false
                  secureId: null
                  secureUrl: null
                  createdAt: '2025-03-28T21:30:42.929Z'
                  updatedAt: '2025-03-28T21:30:42.974Z'
                  paidAt: null
                  ip: '::ffff:127.0.0.1'
                  externalRef: undefined
                  customer:
                    document:
                      id: 00000000-0000-0000-0000-0000000000000
                      number: '33213551000192'
                      type: CNPJ
                      customerId: 00000000-0000-0000-0000-0000000000000
                    address:
                      id: 00000000-0000-0000-0000-0000000000000
                      street: AVENIDA PAULA FERREIRA
                      streetNumber: '3'
                      complement: ''
                      zipCode: '02915000'
                      neighborhood: FREGUESIA DO Ó
                      city: SÃO PAULO
                      state: SP
                      country: br
                  card: null
                  boleto: null
                  pix: null
                  shipping:
                    id: 00000000-0000-0000-0000-0000000000000
                    fee: 0
                    addressId: 00000000-0000-0000-0000-0000000000000
                    transactionId: 00000000-0000-0000-0000-0000000000000
                  refusedReason: '{"code":"ERR_INVALID_ARG_TYPE"}'
                  items:
                    - id: 00000000-0000-0000-0000-0000000000000
                      externalRef: 00000000-0000-0000-0000-0000000000000
                      title: Pepsi gelada
                      unitPrice: 123
                      quantity: 1
                      tangible: false
                      transactionId: 00000000-0000-0000-0000-0000000000000
                  refunds: []
                  delivery: null
                  fee:
                    id: 00000000-0000-0000-0000-0000000000000
                    fixedAmount: 199
                    spreadPercentage: 3.49
                    estimatedFee: 199.349
                    netAmount: -190
                    transactionId: 00000000-0000-0000-0000-0000000000000
                    gatewayId: 00000000-0000-0000-0000-0000000000000
                  qrCode: null
                  barcode: null
                  payUrl: null
                  webUrl: null
                  appUrl: null
                error: null
          headers: {}
          x-apidog-name: Success
        '400':
          description: ''
          content:
            application/json:
              schema:
                type: object
                properties:
                  message:
                    type: string
                    x-apidog-mock: >-
                      Os dados enviados são inválidos. Verifique os campos e
                      tente novamente.
                    default: >-
                      Os dados enviados são inválidos. Verifique os campos e
                      tente novamente.
                  data:
                    type: 'null'
                  status:
                    type: number
                    x-apidog-mock: '400'
                    default: 400
                  error:
                    type: 'null'
                x-apidog-orders:
                  - message
                  - data
                  - status
                  - error
                required:
                  - message
                  - data
                  - status
                  - error
          headers: {}
          x-apidog-name: Bad Request
        '401':
          description: ''
          content:
            application/json:
              schema:
                type: object
                properties:
                  message:
                    type: string
                    x-apidog-mock: Unauthorized
                    default: Unauthorized
                  data:
                    type: 'null'
                  status:
                    type: number
                    x-apidog-mock: '401'
                    default: 401
                  error:
                    type: 'null'
                x-apidog-orders:
                  - message
                  - data
                  - status
                  - error
                required:
                  - message
                  - data
                  - status
                  - error
          headers: {}
          x-apidog-name: Unauthorized
        '403':
          description: ''
          content:
            application/json:
              schema:
                type: object
                properties:
                  message:
                    type: string
                    x-apidog-mock: Forbidden
                    default: Forbidden
                  data:
                    type: 'null'
                  status:
                    type: number
                    x-apidog-mock: '401'
                    default: 403
                  error:
                    type: 'null'
                x-apidog-orders:
                  - message
                  - data
                  - status
                  - error
                required:
                  - message
                  - data
                  - status
                  - error
          headers: {}
          x-apidog-name: Forbidden
        '404':
          description: ''
          content:
            application/json:
              schema:
                type: object
                properties:
                  message:
                    type: string
                    x-apidog-mock: Informação não encontrada
                    default: Informação não encontrada
                  data:
                    type: 'null'
                  status:
                    type: number
                    x-apidog-mock: '404'
                    default: 404
                  error:
                    type: 'null'
                x-apidog-orders:
                  - message
                  - data
                  - status
                  - error
                required:
                  - message
                  - data
                  - status
                  - error
          headers: {}
          x-apidog-name: Not Found
      security: []
      x-apidog-folder: Transactions
      x-apidog-status: released
      x-run-in-apidog: https://app.apidog.com/web/project/1013340/apis/api-19470493-run
components:
  schemas: {}
  securitySchemes: {}
servers: []
security: []

```

