# Runbook — Deploy

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Regra: documento desatualizado é corrigido ou marcado como obsoleto — nunca deixado apodrecendo em silêncio.

## Propósito

Publicar uma nova versão da aplicação Mapas Culturais ES em produção.

## Pré-condições

- [ ] A branch a ser deployada passou pelo fluxo de revisão.
- [ ] A imagem base `hacklab/mapasculturais` está disponível e com a versão desejada.
- [ ] Acesso ao ambiente de produção (Docker Compose ou cluster Kubernetes).

## Procedimento

<!-- TODO: preencher com os passos reais do ambiente de produção do ES. -->

1. Atualize a versão da imagem base no `docker/Dockerfile`, se necessário.
2. Execute o build da imagem:
   ```bash
   sudo docker-compose -f docker-compose.prod.yml build
   ```
3. Reinicie o serviço da aplicação:
   ```bash
   sudo docker-compose -f docker-compose.prod.yml restart mapasculturais
   ```
4. Verifique se o container subiu sem erros:
   ```bash
   sudo docker-compose -f docker-compose.prod.yml logs -f mapasculturais
   ```

## Rollback deste runbook

Veja `rollback.md`.
