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
| **Resultado esperado** | `201 Created`, retorno de `user` e `token` |
| **Resultado obtido** | ✅ `201` |
| **Status** | Aprovado |

### TC02 — Login com credenciais válidas

| Campo | Valor |
|---|---|
| **Endpoint** | `POST /api/login` |
| **Resultado esperado** | `200 OK`, retorno de `user` e novo `token` |
| **Resultado obtido** | ✅ `200` |
| **Status** | Aprovado |

### TC03 — Logout com token válido

| Campo | Valor |
|---|---|
| **Endpoint** | `POST /api/logout` |
| **Resultado esperado** | `200 OK`, mensagem de sucesso |
| **Resultado obtido** | ✅ `200`, `{"message":"Logout realizado com sucesso."}` |
| **Status** | Aprovado |

### TC04 — Acesso à rota protegida sem token (RNF05)

| Campo | Valor |
|---|---|
| **Endpoint** | `POST /api/logout` (sem header Authorization) |
| **Resultado esperado** | `401 Unauthorized` |
| **Resultado obtido** | ✅ `401`, `{"message":"Unauthenticated."}` |
| **Status** | Aprovado |

### TC05 — Reuso de token já revogado

| Campo | Valor |
|---|---|
| **Endpoint** | `POST /api/logout` (token já deslogado) |
| **Resultado esperado** | `401 Unauthorized` |
| **Resultado obtido** | ✅ `401` |
| **Status** | Aprovado |

---

## Módulo: Projetos (`ProjetoController`)

### TC06 — Criação de projeto com dados válidos (RF06)

| Campo | Valor |
|---|---|
| **Endpoint** | `POST /api/projetos` |
| **Resultado esperado** | `201 Created`, projeto retornado com `tecnologias: []` |
| **Resultado obtido** | ✅ `201` |
| **Status** | Aprovado |

### TC07 — Listagem de projetos do usuário autenticado (RF06)

| Campo | Valor |
|---|---|
| **Endpoint** | `GET /api/projetos` |
| **Resultado esperado** | `200 OK`, array com os projetos do usuário logado |
| **Resultado obtido** | ✅ `200` |
| **Status** | Aprovado |

### TC08 — Validação de URL inválida em link de repositório (RN05)

| Campo | Valor |
|---|---|
| **Endpoint** | `POST /api/projetos` — `github: "nao-e-uma-url"` |
| **Resultado esperado** | `422 Unprocessable Content` |
| **Resultado obtido** | ✅ `422`, erro no campo `github` |
| **Status** | Aprovado |

### TC09 — Edição do próprio projeto (RF07)

| Campo | Valor |
|---|---|
| **Endpoint** | `PUT /api/projetos/{id}` |
| **Resultado esperado** | `200 OK`, projeto atualizado |
| **Resultado obtido** | ✅ `200` |
| **Status** | Aprovado |

### TC10 — Tentativa de edição de projeto de outro usuário (RN04)

| Campo | Valor |
|---|---|
| **Endpoint** | `PUT /api/projetos/{id}` (token de usuário não-dono) |
| **Resultado esperado** | `403 Forbidden` |
| **Resultado obtido** | ✅ `403`, `{"message":"This action is unauthorized."}` |
| **Status** | Aprovado |

### TC11 — Exclusão do próprio projeto (RF08)

| Campo | Valor |
|---|---|
| **Endpoint** | `DELETE /api/projetos/{id}` |
| **Resultado esperado** | `204 No Content` |
| **Resultado obtido** | ✅ `204` |
| **Status** | Aprovado |

### TC12 — Confirmação de exclusão (listagem vazia após delete)

| Campo | Valor |
|---|---|
| **Endpoint** | `GET /api/projetos` |
| **Resultado esperado** | `200 OK`, array vazio `[]` |
| **Resultado obtido** | ✅ `200`, `[]` |
| **Status** | Aprovado |

---

## Módulo: Tecnologias (`TecnologiaController`)

### TC13 — Criação de tecnologia com nome válido

| Campo | Valor |
|---|---|
| **Endpoint** | `POST /api/tecnologias` — `{ "nome": "HTML" }` |
| **Resultado esperado** | `201 Created` |
| **Resultado obtido** | ✅ `201` |
| **Status** | Aprovado |

### TC14 — Listagem de todas as tecnologias cadastradas

| Campo | Valor |
|---|---|
| **Endpoint** | `GET /api/tecnologias` |
| **Resultado esperado** | `200 OK`, array com todas as tecnologias (catálogo compartilhado) |
| **Resultado obtido** | ✅ `200` |
| **Status** | Aprovado |

### TC15 — Validação de nome de tecnologia duplicado

| Campo | Valor |
|---|---|
| **Endpoint** | `POST /api/tecnologias` — `{ "nome": "HTML" }` (já existente) |
| **Resultado esperado** | `422 Unprocessable Content` |
| **Resultado obtido** | ✅ `422`, `"The nome has already been taken."` |
| **Status** | Aprovado |

### TC16 — Associação de tecnologias a um projeto via sync (relação N:N)

| Campo | Valor |
|---|---|
| **Endpoint** | `POST /api/projetos` — `"tecnologias": [1, 2]` |
| **Resultado esperado** | `201 Created`, projeto com array `tecnologias` e `pivot` (`projeto_id`, `tecnologia_id`) |
| **Resultado obtido** | ✅ `201`, associação confirmada via tabela `projeto_tecnologia` |
| **Status** | Aprovado |

---

## Módulo: Dashboard (`DashboardController`)

### TC17 — Contadores do dashboard do usuário autenticado (RF09)

| Campo | Valor |
|---|---|
| **Endpoint** | `GET /api/dashboard` |
| **Resultado esperado** | `200 OK`, JSON com `total_projetos`, `total_tecnologias`, `projetos_finalizados`, `projetos_em_desenvolvimento` |
| **Resultado obtido** | ✅ `200`, `{"total_projetos":1,"total_tecnologias":2,"projetos_finalizados":0,"projetos_em_desenvolvimento":1}` |
| **Status** | Aprovado |

---

## Módulo: Pesquisa e Filtros (`ProjetoController@index`)

### TC18 — Pesquisa de projetos por nome (RF10)

| Campo | Valor |
|---|---|
| **Endpoint** | `GET /api/projetos?busca=Tecnologias` |
| **Resultado esperado** | `200 OK`, retorna apenas projetos cujo nome contém o termo |
| **Resultado obtido** | ✅ `200`, projeto correto retornado |
| **Status** | Aprovado |

### TC19 — Filtro de projetos por status (RF11)

| Campo | Valor |
|---|---|
| **Endpoint** | `GET /api/projetos?status=Em desenvolvimento` |
| **Resultado esperado** | `200 OK`, retorna apenas projetos com o status informado |
| **Resultado obtido** | ✅ `200` |
| **Status** | Aprovado |

### TC20 — Filtro de projetos por tecnologia associada (RF11)

| Campo | Valor |
|---|---|
| **Endpoint** | `GET /api/projetos?tecnologia=1` |
| **Resultado esperado** | `200 OK`, retorna apenas projetos que possuem a tecnologia com esse ID |
| **Resultado obtido** | ✅ `200` |
| **Status** | Aprovado |

### TC21 — Filtros combinados: busca + status + tecnologia (RF11)

| Campo | Valor |
|---|---|
| **Endpoint** | `GET /api/projetos?busca=Projeto&status=Em desenvolvimento&tecnologia=1` |
| **Resultado esperado** | `200 OK`, filtros aplicados simultaneamente |
| **Resultado obtido** | ✅ `200` |
| **Status** | Aprovado |

---

## Módulo: Perfil e Portfólio Público (`PerfilController`, `PortfolioController`)

### TC22 — Edição do próprio perfil (RF04)

| Campo | Valor |
|---|---|
| **Endpoint** | `PUT /api/perfil` — `{ "bio": "...", "cidade": "Porto Alegre", "estado": "RS" }` |
| **Resultado esperado** | `200 OK`, dados atualizados no retorno |
| **Resultado obtido** | ✅ `200`, `bio`, `cidade` e `estado` atualizados |
| **Status** | Aprovado |

### TC23 — Visualização de portfólio público sem autenticação (RF12)

| Campo | Valor |
|---|---|
| **Endpoint** | `GET /api/portfolio/{id}` (sem header Authorization) |
| **Resultado esperado** | `200 OK`, dados públicos + projetos, **sem** expor `email`/`password` |
| **Resultado obtido** | ✅ `200`, dados públicos corretos, campos sensíveis omitidos |
| **Status** | Aprovado |

---

## Resumo de cobertura

Todos os 14 Requisitos Funcionais (RF01–RF14) do SRS possuem endpoint implementado e testado, com exceção de RF03 (recuperação de senha simulada), RF05 (ViaCEP) e RF13 (GitHub API), que são integrações consumidas diretamente pelo front-end.

## Pendente de teste (regressão/futuro)

- [ ] Tentativa de exclusão de projeto de **outro** usuário (RN04 — deve retornar `403 Forbidden`, simétrico ao TC10)
- [ ] Testes automatizados (Pest/PHPUnit) cobrindo os cenários acima

---

## Como adicionar novos casos de teste

```markdown
### TCxx — Nome do cenário testado

| Campo | Valor |
|---|---|
| **Endpoint** | `MÉTODO /api/rota` |
| **Resultado esperado** | |
| **Resultado obtido** | |
| **Status** | Aprovado / Reprovado |
```