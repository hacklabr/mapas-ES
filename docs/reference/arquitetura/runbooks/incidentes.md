# Runbook — Incidentes

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Regra: documento desatualizado é corrigido ou marcado como obsoleto — nunca deixado apodrecendo em silêncio.

## Propósito

Orientar a resposta a incidentes em produção do Mapa Cultural ES.

## Pré-condições

- [ ] Acesso aos logs (`docker-data/logs/` ou `docker-compose logs`).
- [ ] Acesso ao banco de dados (PostGIS).
- [ ] Canal de comunicação com a equipe definido.

## Procedimento

<!-- TODO: preencher com os passos reais do ambiente de produção do ES. -->

1. Identifique o escopo do incidente (qual serviço, qual funcionalidade, quais usuários afetados).
2. Colete logs recentes:
   ```bash
   sudo docker-compose -f docker-compose.prod.yml logs --tail=200 mapasculturais
   ```
3. Verifique a saúde dos containers:
   ```bash
   sudo docker-compose -f docker-compose.prod.yml ps
   ```
4. Se necessário, execute o rollback para a última versão estável (`runbooks/rollback.md`).
5. Documente o incidente e as ações tomadas.

## Rollback deste runbook

Veja `runbooks/rollback.md`.
