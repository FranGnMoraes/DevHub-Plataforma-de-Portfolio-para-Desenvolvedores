# DevHub — Plataforma de Portfólio para Desenvolvedores

> ⚠️ **Projeto fictício / acadêmico.** O DevHub é um projeto de estudo que simula o desenvolvimento de um produto real para um cliente, incluindo documentação de requisitos, design system e ciclo completo de desenvolvimento full stack. Não representa uma empresa ou cliente real.

## Sobre o projeto

O DevHub é uma plataforma web para centralizar e apresentar portfólios de desenvolvedores, permitindo que estudantes e profissionais de tecnologia organizem seus projetos, tecnologias dominadas e dados profissionais em uma página pública otimizada para recrutadores e times técnicos.

Este repositório documenta o desenvolvimento simulado do produto do zero, cobrindo quatro frentes de trabalho:

- **Back-end** — API REST em Laravel + MySQL
- **Front-end** — SPA em React + Tailwind CSS
- **UX/UI** — Wireframes, protótipos e fluxos de usuário (Figma)
- **Design Gráfico** — Identidade visual, design system, paleta de cores e tipografia

## Stack Tecnológica

| Camada | Tecnologia |
|---|---|
| Back-end | Laravel (PHP) |
| Front-end | React + Tailwind CSS |
| Banco de dados | MySQL |
| Autenticação | Laravel Sanctum (token-based) |
| Design | Figma |
| Integrações externas | ViaCEP API, GitHub API |

## Status do Projeto

### ✅ Concluído

- [x] Modelagem do banco de dados (tabelas `users`, `projetos`, `tecnologias`, `projeto_tecnologia`)
- [x] Migrations criadas e executadas
- [x] Relacionamentos Eloquent entre os models (`User`, `Projeto`, `Tecnologia`)
- [x] Autenticação por token configurada (Laravel Sanctum)
- [x] Documento de Requisitos (SRS) e Documento de Design do Sistema elaborados

### 🔄 Em andamento / próximos passos

**Back-end**
- [ ] Controllers de autenticação (cadastro, login, logout)
- [ ] CRUD completo de projetos
- [ ] Regras de autorização (somente o dono edita/exclui seus projetos)
- [ ] Endpoints de dashboard, busca e filtros

**UX/UI**
- [ ] Wireframes de baixa fidelidade das telas principais
- [ ] Protótipo navegável de alta fidelidade
- [ ] Validação de fluxos de usuário

**Design Gráfico**
- [ ] Identidade visual (logotipo, paleta de cores, tipografia)
- [ ] Design system documentado (componentes, estados, tokens visuais)

**Front-end**
- [ ] Setup do projeto React + Tailwind
- [ ] Telas de autenticação (login, cadastro)
- [ ] Dashboard e CRUD de projetos
- [ ] Integrações com ViaCEP e GitHub API
- [ ] Página pública de portfólio
- [ ] Landing page
- [ ] Responsividade e acessibilidade (WCAG AA)

## Como rodar o back-end

```bash
# Instalar dependências
composer install

# Configurar variáveis de ambiente
cp .env.example .env
php artisan key:generate

# Configurar conexão com o MySQL no arquivo .env
# DB_DATABASE, DB_USERNAME, DB_PASSWORD

# Rodar as migrations
php artisan migrate

# Subir o servidor local
php artisan serve
```

## Estrutura do repositório

```
devhub/
├── backend/     # API Laravel
└── frontend/    # SPA React (em desenvolvimento)
```

## Licença

Projeto de fins educacionais, sem fins comerciais.