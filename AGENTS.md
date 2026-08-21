# AGENTS.md — Mapa Cultural do Espírito Santo

## 1. Contexto do projeto

Instância customizada do Mapas Culturais v7.6.27 para a Secretaria da Cultura do Espírito Santo. O repositório estende o core com temas em `themes/` e plugins em `plugins/`. A fonte de verdade do produto é o PRD vivo em `docs/reference/prd.md`.

## 2. Comandos verificáveis

| Ação | Comando |
|---|---|
| Build | `pnpm install --recursive && pnpm run build` |
| Testes | <!-- TODO: preencher --> |
| Lint | <!-- TODO: preencher --> |
| Typecheck | <!-- TODO: preencher --> |

Rode os comandos relevantes antes de declarar qualquer tarefa pronta.

## 3. Mapa da estrutura

- `docker/` — configurações Docker e arquivos de configuração do core.
- `docker-compose.prod.yml` — orquestração de produção.
- `themes/` — temas filhos do Mapas Culturais:
  - `MapaCulturalES/` — tema BaseV2 ativo (identidade visual, assets, webmanifest).
  - `EspiritoSanto/` — tema BaseV1 legado (textos, db-updates).
  - `SampleTheme/` — esqueleto de referência.
- `plugins/` — plugins customizados; `SettingsES` é o principal (regras de exceção e relatório LICC).
- `docs/reference/` — documentação viva do produto.
- `docs/decisions/adr/` — registros de decisão técnica.

## 4. Regras invioláveis

- Nunca commitar sem rodar os testes.
- Nunca criar arquivos sem necessidade.
- Nunca editar migrations/db-updates já aplicados.
- Nunca adicionar dependências sem justificar.
- Nunca desativar checks de CI para fazer o build passar.
- Nunca hardcodar novos IDs de entidade sem ADR e sem avaliar uma alternativa configurável.

## 5. Convenções

As convenções vivem em `docs/reference/conventions/` (`code-style.md`, `git-workflow.md`, `api-design.md`). Leia antes de escrever código — este arquivo aponta, não duplica.

## 6. Workflow esperado

- Planeje antes de codar.
- Rode os comandos relevantes da seção 2 antes de declarar pronto.
- Formato de commit e PR/MR conforme `docs/reference/conventions/git-workflow.md`.
- Consulte `docs/reference/jornadas.md` antes de alterar fluxos de usuário.
- Consulte `docs/reference/arquitetura/INDEX.md` antes de alterar regras de negócio ou integrações.

## 7. Ponteiros

- `docs/reference/prd.md` → produto e requisitos (fonte de verdade)
- `docs/reference/jornadas.md` → fluxos de usuário
- `docs/reference/arquitetura/INDEX.md` → fonte de verdade da arquitetura
- `docs/decisions/adr/` → ADRs (registros de decisão técnica)
- `.agents/skills/` → catálogo de procedimentos sob demanda

## Skills — procedimentos sob demanda

Regras sempre ativas ficam neste arquivo; procedimentos vivem em `.agents/skills/`. Um procedimento só vira skill quando é repetível, multi-etapa ou de alto custo de erro — e não-óbvio (se qualquer agente acerta sem orientação, não precisa de skill).

**Evolução contínua:** quando uma decisão consolidada ou padrão recorrente emergir no dia a dia, proponha uma skill usando `.agents/skills/exemplo-skill/SKILL.md` como formato — nunca crie sem aprovação explícita.

## ADRs são imutáveis

Decisão nova = ADR novo em `docs/decisions/adr/` (sequência de 4 dígitos a partir do máximo existente), que referencia o substituído. Nunca edite um ADR aceito; nunca renumere ADRs existentes. Formato: `docs/decisions/adr/0000-template-adr.md`.
