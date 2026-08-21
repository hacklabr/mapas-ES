# Jornadas de usuário — Mapa Cultural do Espírito Santo

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Regra: documento desatualizado é corrigido ou marcado como obsoleto — nunca deixado apodrecendo em silêncio.

Este documento descreve as jornadas de usuário do produto. Cada jornada inclui: ator, objetivo, passos principais e pontos de dor conhecidos.

## Jornadas mapeadas

### Jornada 1 — Gestor gerando relatório LICC

- **Ator:** administrador logado.
- **Objetivo:** auditar o histórico de alterações e arquivos de uma lista de inscrições.
- **Passos:**
  1. Acessa `/essettings/liccSummary`.
  2. Insere os números das inscrições no textarea, separados por vírgula, ponto-e-vírgula ou quebra de linha.
  3. Opcionalmente marca “Exibir histórico de alterações”.
  4. Submete para `POST generateLiccSummary`.
  5. Sistema valida entrada, busca revisões em `entity_revision` e arquivos em `file`, e renderiza as tabelas de resultado.
- **Pontos de dor:** acesso restrito a quem tem permissão `@control` sobre a oportunidade; separadores de entrada devem ser flexíveis.

### Jornada 2 — Avaliador corrigindo nota após incidente de metadados

- **Ator:** avaliador cujo ID está na lista autorizada (`1787793248`, `2060560646`, `1246987641` ou `164822607`).
- **Objetivo:** modificar a avaliação da inscrição `13048` após correção de dados.
- **Passos:**
  1. Acessa a inscrição `13048`.
  2. O plugin intercepta os hooks `can(RegistrationEvaluation.modify)` e `can(Registration.evaluate)` e libera a permissão para o avaliador autorizado.
  3. Avaliador altera a nota/comentário.
  4. O core registra a nova revisão da avaliação.
- **Pontos de dor:** a regra é hardcoded; qualquer nova exceção exige deploy.

### Jornada 3 — Cidadão se inscrevendo em uma oportunidade cultural

- **Ator:** agente cultural cadastrado.
- **Objetivo:** encontrar e se inscrever em editais/oportunidades.
- **Passos:**
  1. Acessa a home personalizada do Mapa Cultural ES.
  2. Visualiza textos institucionais e imagens configurados.
  3. Navega até a seção de oportunidades e escolhe um edital.
  4. Realiza a inscrição (prefixo das inscrições: `es-`).
- **Pontos de dor:** textos e imagens podem estar duplicados entre o tema BaseV1 legado e o BaseV2 ativo.

### Jornada 4 — Beneficiário enviando rascunho fora do prazo

- **Ator:** inscrito na oportunidade `265` que salvou rascunho antes do encerramento.
- **Objetivo:** enviar a inscrição após o fim do período oficial.
- **Passos:**
  1. Acessa sua inscrição em rascunho.
  2. O hook `can(Registration.send)` detecta oportunidade `265` e `sentTimestamp` preenchido.
  3. Sistema permite o envio mesmo com o período encerrado.
- **Pontos de dor:** exceção pontual sem interface administrativa; risco de replicar o padrão para outras oportunidades.
