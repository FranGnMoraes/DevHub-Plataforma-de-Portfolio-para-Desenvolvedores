# DevHub — Cronograma Completo do Projeto

Baseado no Documento de Requisitos (SRS) v1.0 e no Documento de Design do Sistema v1.0.
Cronograma reorganizado em duas fases: **Sprint Intensiva** (semana com disponibilidade total) e
**Ritmo Regular** (a partir do retorno à faculdade, estágio e bolsa de front-end).

---

# FASE 1 — SPRINT INTENSIVA (20 a 26/07)

Manhãs = Back-end | Tardes = UX/UI | Fim de semana = Front-end

## Segunda, 20/07

**Manhã — Back-end**
- [X] DEVHUB-05 — Model `User`: relacionamento `hasMany` com Projeto
- [X] DEVHUB-06 — Model `Projeto`: relacionamentos `belongsTo` e `belongsToMany`
- [X] DEVHUB-07 — Model `Tecnologia`: relacionamento `belongsToMany`
- [X] DEVHUB-08 — Testar relacionamentos via Tinker
- [X] DEVHUB-09 — Instalar e configurar Sanctum (RNF05)

**Noite — UX/UI**
- [ ] DEVHUB-55 — Wireframe baixa fidelidade: Login (11.2)
- [ ] DEVHUB-56 — Wireframe baixa fidelidade: Cadastro (11.3)
- [ ] DEVHUB-57 — Wireframe baixa fidelidade: Dashboard (11.4)

## Terça, 21/07

**Manhã — Back-end**
- [ ] DEVHUB-10 — `AuthController`: register, login, logout — RF01, RF02, RF14
- [ ] DEVHUB-11 — Request classes de validação — RNF06
- [ ] DEVHUB-12 — Testar endpoints de auth (Postman/Insomnia)

**Tarde — UX/UI**
- [ ] DEVHUB-58 — Wireframe baixa fidelidade: Lista de Projetos (11.7)
- [ ] DEVHUB-59 — Wireframe baixa fidelidade: Cadastro de Projetos (11.6)
- [ ] DEVHUB-60 — Wireframe baixa fidelidade: Edição de Projetos
- [ ] DEVHUB-61 — Wireframe baixa fidelidade: Perfil do Usuário (11.5)

## Quarta, 22/07

**Manhã — Back-end**
- [ ] DEVHUB-13 — `ProjetoController` CRUD completo — RF06, RF07, RF08
- [ ] DEVHUB-14 — Middleware/Policy de propriedade — RN04

**Tarde — UX/UI**
- [ ] DEVHUB-62 — Wireframe baixa fidelidade: Página Pública do Portfólio (11.8)
- [ ] DEVHUB-63 — Wireframe baixa fidelidade: Landing Page (11.1)
- ✅ **Marco:** as 8 telas obrigatórias têm wireframe de baixa fidelidade concluído

## Quinta, 23/07

**Manhã — Back-end**
- [ ] DEVHUB-15 — Endpoint de tecnologias + `attach`/`sync`
- [ ] DEVHUB-16 — Validação de URLs via RegEx — RN05
- [ ] DEVHUB-17 — Endpoint do Dashboard (contadores) — RF09

**Tarde — UX/UI**
- [ ] DEVHUB-64 — Protótipo alta fidelidade: Login, Cadastro e Dashboard (aplicando Design System)

## Sexta, 24/07

**Manhã — Back-end**
- [ ] DEVHUB-18 — Endpoint de pesquisa e filtros — RF10, RF11
- ✅ **Marco:** backend cobre 100% dos endpoints do MVP (RF01–RF14)

**Tarde — UX/UI**
- [ ] DEVHUB-65 — Protótipo alta fidelidade: Lista/Cadastro/Edição de Projetos e Perfil
- ✅ **Marco:** entregável mínimo de UX/UI (alta fidelidade das telas prioritárias) concluído

## Sábado, 25/07 — Front-end (dia inteiro)

- [ ] DEVHUB-19 — Setup React + Vite + Tailwind (projeto separado do backend)
- [ ] DEVHUB-20 — Configurar tokens do Design System no `tailwind.config.js`
- [ ] DEVHUB-21 — Tema escuro como padrão (#0F172A)
- [ ] DEVHUB-22 — Componentes base: Button, Input, Card, Tag
- [ ] DEVHUB-23 — Configurar cliente axios com baseURL da API

## Domingo, 26/07 — Front-end

- [ ] DEVHUB-24 — Tela de Login consumindo a API — RF02
- [ ] DEVHUB-25 — Tela de Cadastro — RF01
- [ ] DEVHUB-27 — Context de autenticação + rotas protegidas
- [ ] DEVHUB-28 — Componente Navbar (se sobrar tempo)
- [ ] DEVHUB-29 — Componente Sidebar (se sobrar tempo)

---

# FASE 2 — RITMO REGULAR (a partir de 27/07)

A partir daqui: faculdade à noite, estágio à tarde, bolsa de front-end terça/quinta de manhã.
Disponibilidade real para o DevHub: **segunda, quarta e sexta de manhã + finais de semana.**
Por isso, cada bloco abaixo ocupa aproximadamente **2 semanas de calendário**, não 1.

## Sprint 2 — Dashboard e CRUD de Projetos no Front-end (27/07 a 09/08)

- [ ] DEVHUB-30 — Tela Dashboard: cards de KPI consumindo `GET /dashboard` — RF09
- [ ] DEVHUB-31 — Estados de carregamento (skeleton)
- [ ] DEVHUB-32 — Tela Lista de Projetos: grid + pesquisa (RF10) + filtros (RF11)
- [ ] DEVHUB-33 — Modal de confirmação de exclusão — RF08
- [ ] DEVHUB-34 — Tela Cadastro de Projetos: formulário + upload de capa + tecnologias — RF06
- [ ] DEVHUB-35 — Tela Edição de Projetos — RF07
- [ ] DEVHUB-36 — Validação de URLs em tempo real no front

## Sprint 3 — Integrações Externas e Páginas Públicas (10/08 a 23/08)

- [ ] DEVHUB-37 — Tela Perfil do Usuário — RF04
- [ ] DEVHUB-38 — Integração ViaCEP (preenchimento automático de endereço) — RF05
- [ ] DEVHUB-39 — Importação via GitHub API — RF13
- [ ] DEVHUB-40 — Tratamento de erros das integrações
- [ ] DEVHUB-41 — Página Pública do Portfólio — RF12
- [ ] DEVHUB-42 — Landing Page
- [ ] DEVHUB-43 — Botão de compartilhar portfólio
- [ ] DEVHUB-44 — Sistema de Alertas/Toasts

## Sprint 4 — Responsividade, Acessibilidade, QA e Entrega (24/08 a 06/09)

- [ ] DEVHUB-45 — Validar breakpoints (mobile/tablet/desktop) — RNF01
- [ ] DEVHUB-46 — Auditoria de contraste mínimo AA
- [ ] DEVHUB-47 — Navegação completa por teclado
- [ ] DEVHUB-48 — Atributos `alt` em imagens
- [ ] DEVHUB-49 — Teste cross-browser (Chrome, Edge, Firefox) — RNF02
- [ ] DEVHUB-50 — Revisão de segurança (hash de senha, rotas 401 sem token) — RNF04, RNF05
- [ ] DEVHUB-51 — Teste de performance (resposta da API < 3s) — RNF03
- [ ] DEVHUB-52 — Teste end-to-end do fluxo completo
- [ ] DEVHUB-53 — Escrever `README.md`
- [ ] DEVHUB-54 — Checklist final do DoD (seção 11 do SRS)

---

## Escopo Plus (opcional)

- Tema Claro/Escuro (toggle persistido)
- Animações fluidas (Framer Motion)
- Página de Favoritos
- Páginas institucionais (Sobre e Contato)

---
