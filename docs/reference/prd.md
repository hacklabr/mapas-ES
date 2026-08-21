# PRD vivo — Mapa Cultural do Espírito Santo

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Regra: documento desatualizado é corrigido ou marcado como obsoleto — nunca deixado apodrecendo em silêncio.

Este é o Product Requirements Document (PRD) vivo do projeto. Ele descreve o produto como ele é hoje. Mudanças de comportamento passam por este documento no mesmo round em que são implementadas.

## 1. Contexto

O Mapa Cultural do Espírito Santo é uma instância customizada da plataforma Mapas Culturais (v7.6.27), mantida pela Hacklab. O repositório contém temas e plugins específicos para o estado do Espírito Santo.

## 2. Requisitos funcionais (RF)

### RF-001 — Identidade visual e conteúdo institucional da Secult ES
O sistema deve exibir a identidade visual do estado: logo, cores, favicon, imagens da home e textos institucionais.

**Critérios de aceitação:**
- O tema ativo é configurado como `MapaCulturalES`.
- Logo, favicon e imagens da home são configurados via arquivos em `docker/common/config.d/`.
- Paleta de cores e dimensões do logo são definidas no tema ativo.
- Textos da home e das entidades podem ser sobrescritos via configuração do core.

### RF-002 — Exceção de envio de rascunho fora do prazo para a oportunidade 265
Permitir que inscrições em rascunho da oportunidade `265` sejam enviadas mesmo após o encerramento do período de inscrições, desde que já possuam `sentTimestamp`.

**Critérios de aceitação:**
- O hook `can(Registration.send)` retorna `true` quando a oportunidade é `265` e o campo `sentTimestamp` está preenchido.

### RF-003 — Reabertura de avaliações após incidente de metadados duplicados
Permitir que avaliadores específicos modifiquem/reavaliam a inscrição `13048` após correção de metadados duplicados.

**Critérios de aceitação:**
- Os usuários `1787793248`, `2060560646`, `1246987641` e `164822607` têm permissão para modificar e avaliar a inscrição `13048`.
- Os hooks `can(RegistrationEvaluation.modify)` e `can(Registration.evaluate)` concedem permissão apenas para essa combinação exata.

### RF-004 — Relatório administrativo de inscrições (LICC)
Disponibilizar tela autenticada para inserir uma lista de números de inscrição e gerar resumo com histórico de revisões e lista de arquivos anexados.

**Critérios de aceitação:**
- A tela de entrada está disponível em `/essettings/liccSummary`.
- O endpoint `POST generateLiccSummary` aceita números separados por vírgula, ponto-e-vírgula ou quebra de linha.
- O resultado exibe tabela de revisões (quando solicitado) e tabela de arquivos.
- O acesso é restrito a usuários autenticados com permissão `@control` sobre a oportunidade da inscrição.

### RF-005 — Geração de revisões históricas para oportunidades específicas
Executar atualizações pontuais de banco para criar revisões de avaliações/inscrições das oportunidades `159`, `156`, `239` e `479`.

**Critérios de aceitação:**
- As revisões são criadas apenas se ainda não existirem para a entidade.
- As atualizações residem no db-update do tema `EspiritoSanto`.

## 3. Requisitos não-funcionais (RNF)

<!-- TODO: preencher com restrições de performance, segurança, acessibilidade, compliance etc. -->

## 4. Critérios de aceitação gerais

<!-- TODO: preencher com critérios transversais de aceitação. -->

## 5. Fora de escopo

<!-- TODO: registrar explicitamente o que não faz parte do produto. -->

## 6. Histórico de mudanças

| Data | Round | Mudança |
|---|---|---|
| 2026-08-21 | Setup | Criação do PRD vivo com os 5 RFs identificados no legado. |
