# Runbook — Rollback

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Regra: documento desatualizado é corrigido ou marcado como obsoleto — nunca deixado apodrecendo em silêncio.

## Propósito

Reverter a aplicação para a versão anteriormente estável quando um deploy introduz regressão ou falha.

## Pré-condições

- [ ] Identificada a imagem/tag da versão anterior estável.
- [ ] Acesso ao ambiente de produção.

## Procedimento

<!-- TODO: preencher com os passos reais do ambiente de produção do ES. -->

1. Pare o serviço atual:
   ```bash
   sudo docker-compose -f docker-compose.prod.yml stop mapasculturais
   ```
2. Volte a tag da imagem para a versão anterior no `docker/Dockerfile` ou via override de imagem no compose.
3. Execute o build/pull e reinicie:
   ```bash
   sudo docker-compose -f docker-compose.prod.yml up -d mapasculturais
   ```
4. Verifique logs e funcionalidades críticas.

## Rollback deste runbook

Não aplicável — este é o próprio runbook de rollback.
