# Convenção de API — Mapa Cultural do Espírito Santo

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Regra: documento desatualizado é corrigido ou marcado como obsoleto — nunca deixado apodrecendo em silêncio.

## APIs do core

O Mapas Culturais fornece APIs REST e endpoints do ControllerAPI. Sempre que possível, reuse os controllers e entidades do core.

## Controllers customizados

- Registre controllers de plugin via `$app->registerController(...)`.
- Documente endpoints novos no PRD ou jornada correspondente.
- Aplique `requireAuthentication` e checks de permissão (`@control`) antes de expor dados sensíveis.

## Versionamento

<!-- TODO: preencher se houver convenção de versionamento de API. -->
