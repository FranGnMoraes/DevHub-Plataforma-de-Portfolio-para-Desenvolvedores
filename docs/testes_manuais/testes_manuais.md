# DevHub — Registro de Testes Manuais (QA)

Este documento registra os testes manuais realizados na API do DevHub, feitos via `curl`, incluindo o cenário testado, o payload enviado, o resultado esperado e o resultado obtido. Serve como evidência de QA e histórico de validação dos endpoints conforme o desenvolvimento avança.

**Ferramenta utilizada:** curl (linha de comando)
**Ambiente:** local (Docker + MySQL 8.0 + `php artisan serve`)

---

## Módulo: Autenticação (`AuthController`)

### TC01 — Registro de usuário com dados válidos

| Campo | Valor |
|---|---|
| **Endpoint** | `POST /api/register` |
| **Payload** | `{ "name": "Teste", "sobrenome": "QA", "email": "teste.qa@devhub.com", "password": "senha12345", "password_confirmation": "senha12345" }` |
| **Resultado esperado** | `201 Created`, retorno de `user` e `token` |
| **Resultado obtido** | ✅ `201`, `user` criado com sucesso, `token` gerado |
| **Status** | Aprovado |

### TC02 — Login com credenciais válidas

| Campo | Valor |
|---|---|
| **Endpoint** | `POST /api/login` |
| **Payload** | `{ "email": "teste.qa@devhub.com", "password": "senha12345" }` |
| **Resultado esperado** | `200 OK`, retorno de `user` e novo `token` |
| **Resultado obtido** | ✅ `200`, `user` completo retornado, novo `token` gerado |
| **Status** | Aprovado |

### TC03 — Logout com token válido

| Campo | Valor |
|---|---|
| **Endpoint** | `POST /api/logout` |
| **Header** | `Authorization: Bearer {token válido}` |
| **Resultado esperado** | `200 OK`, mensagem de sucesso |
| **Resultado obtido** | ✅ `200`, `{"message":"Logout realizado com sucesso."}` |
| **Status** | Aprovado |

### TC04 — Acesso à rota protegida sem token (RNF05)

| Campo | Valor |
|---|---|
| **Endpoint** | `POST /api/logout` |
| **Header** | nenhum header de autorização |
| **Resultado esperado** | `401 Unauthorized` |
| **Resultado obtido** | ✅ `401`, `{"message":"Unauthenticated."}` |
| **Status** | Aprovado |

### TC05 — Reuso de token já revogado

| Campo | Valor |
|---|---|
| **Endpoint** | `POST /api/logout` |
| **Header** | `Authorization: Bearer {token já deslogado anteriormente}` |
| **Resultado esperado** | `401 Unauthorized` |
| **Resultado obtido** | ✅ `401`, token inválido rejeitado |
| **Status** | Aprovado |

---

## Módulo: Projetos (`ProjetoController`)

### TC06 — Criação de projeto com dados válidos (RF06)

| Campo | Valor |
|---|---|
| **Endpoint** | `POST /api/projetos` |
| **Header** | `Authorization: Bearer {token válido}` |
| **Payload** | `{ "nome": "Meu Primeiro Projeto", "descricao": "Projeto de teste do CRUD", "github": "https://github.com/usuario/projeto", "status": "Em desenvolvimento" }` |
| **Resultado esperado** | `201 Created`, projeto retornado com `tecnologias: []` |
| **Resultado obtido** | ✅ `201`, projeto criado e vinculado ao usuário autenticado |
| **Status** | Aprovado |

### TC07 — Listagem de projetos do usuário autenticado (RF06)

| Campo | Valor |
|---|---|
| **Endpoint** | `GET /api/projetos` |
| **Header** | `Authorization: Bearer {token válido}` |
| **Resultado esperado** | `200 OK`, array contendo os projetos do usuário logado |
| **Resultado obtido** | ✅ `200`, projeto criado no TC06 retornado corretamente |
| **Status** | Aprovado |

### TC08 — Validação de URL inválida em link de repositório (RN05)

| Campo | Valor |
|---|---|
| **Endpoint** | `POST /api/projetos` |
| **Header** | `Authorization: Bearer {token válido}` |
| **Payload** | `{ "nome": "Projeto Invalido", "descricao": "Teste de validacao", "github": "nao-e-uma-url", "status": "Em desenvolvimento" }` |
| **Resultado esperado** | `422 Unprocessable Content`, erro de validação no campo `github` |
| **Resultado obtido** | ✅ `422`, `{"message":"The github field format is invalid.","errors":{"github":["The github field format is invalid."]}}` |
| **Status** | Aprovado |

### TC09 — Edição do próprio projeto (RF07)

| Campo | Valor |
|---|---|
| **Endpoint** | `PUT /api/projetos/{id}` |
| **Header** | `Authorization: Bearer {token do dono do projeto}` |
| **Payload** | `{ "nome": "Projeto Editado", "descricao": "Descricao atualizada", "status": "Finalizado" }` |
| **Resultado esperado** | `200 OK`, projeto atualizado com os novos dados |
| **Resultado obtido** | ✅ `200`, `nome`, `descricao` e `status` atualizados corretamente |
| **Status** | Aprovado |

### TC10 — Tentativa de edição de projeto de outro usuário (RN04)

| Campo | Valor |
|---|---|
| **Endpoint** | `PUT /api/projetos/{id}` |
| **Header** | `Authorization: Bearer {token de um usuário que NÃO é dono do projeto}` |
| **Payload** | `{ "nome": "Tentativa de Invasao", "descricao": "Nao deveria funcionar", "status": "Finalizado" }` |
| **Resultado esperado** | `403 Forbidden` |
| **Resultado obtido** | ✅ `403`, `{"message":"This action is unauthorized."}` — Policy bloqueou corretamente |
| **Status** | Aprovado |

### TC11 — Exclusão do próprio projeto (RF08)

| Campo | Valor |
|---|---|
| **Endpoint** | `DELETE /api/projetos/{id}` |
| **Header** | `Authorization: Bearer {token do dono do projeto}` |
| **Resultado esperado** | `204 No Content` |
| **Resultado obtido** | ✅ `204`, sem corpo de resposta |
| **Status** | Aprovado |

### TC12 — Confirmação de exclusão (projeto não aparece mais na listagem)

| Campo | Valor |
|---|---|
| **Endpoint** | `GET /api/projetos` |
| **Header** | `Authorization: Bearer {token do dono do projeto excluído}` |
| **Resultado esperado** | `200 OK`, array vazio `[]` |
| **Resultado obtido** | ✅ `200`, `[]` |
| **Status** | Aprovado |

---

## Pendente de teste (próximas tasks)

- [ ] Tentativa de exclusão de projeto de **outro** usuário (RN04 — deve retornar `403 Forbidden`, simétrico ao TC10)
- [ ] Endpoint de tecnologias + associação via `attach`/`sync`
- [ ] Endpoint do Dashboard (contadores)
- [ ] Endpoint de pesquisa e filtros combinados

---

## Como adicionar novos casos de teste

Ao testar uma nova rota, copie o modelo de tabela abaixo e preencha:

```markdown
### TCxx — Nome do cenário testado

| Campo | Valor |
|---|---|
| **Endpoint** | `MÉTODO /api/rota` |
| **Header** | (se necessário) |
| **Payload** | (se necessário) |
| **Resultado esperado** | |
| **Resultado obtido** | |
| **Status** | Aprovado / Reprovado |
```