# Arquitetura — Mapa Cultural do Espírito Santo

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Regra: documento desatualizado é corrigido ou marcado como obsoleto — nunca deixado apodrecendo em silêncio.

Este documento descreve a arquitetura interna do sistema como ela é hoje.

## 1. Visão geral

O projeto é uma instância Dockerizada do Mapas Culturais v7.6.27, estendida por temas e plugins customizados. Não há novas entidades de domínio; as personalizações ocorrem via temas filhos, interceptação de hooks e um controller customizado.

## 2. Componentes principais

| Componente | Responsabilidade | Integração com o core | Arquivos principais |
|---|---|---|---|
| **Tema `MapaCulturalES`** | Identidade visual ativa (BaseV2): cores, logo, favicon, imagens da home, webmanifest. | Estende `\MapasCulturais\Themes\BaseV2\Theme`; sobrescreve `_init()` e adiciona hook `GET(site.webmanifest)`. | `themes/MapaCulturalES/Theme.php` <br> `themes/MapaCulturalES/assets-src/sass/theme-BaseV2.scss` |
| **Tema `EspiritoSanto`** | Tema legado BaseV1: textos institucionais, logotipos e db-updates de revisão. | Estende `\MapasCulturais\Themes\BaseV1\Theme`; sobrescreve `_getTexts()` e partials de layout. | `themes/EspiritoSanto/Theme.php` <br> `themes/EspiritoSanto/db-updates.php` |
| **Plugin `SettingsES`** | Regras de exceção e relatório administrativo LICC. | Estende `\MapasCulturais\Plugin`; registra controller `essettings` e intercepta hooks `can(...)`. | `plugins/SettingsES/Plugin.php` <br> `plugins/SettingsES/Controller.php` |
| **Configurações Docker** | Build e orquestração de produção. | Imagem base `hacklab/mapasculturais:7.6.27`; copia `themes/` e `plugins/` para dentro da imagem no build. | `docker/Dockerfile` <br> `docker-compose.prod.yml` |
| **Configurações do core** | Ativação de tema, plugins, textos, logo, favicon, autenticação, módulos. | Arquivos PHP retornando arrays de configuração carregados pelo Mapas Culturais. | `docker/common/config.d/*` <br> `docker/production/config.d/*` |

## 3. Dados e entidades

Não foram criadas tabelas novas. As personalizações operam sobre as entidades já existentes do core:

- `MapasCulturais\Entities\Registration` (inscrições)
- `MapasCulturais\Entities\RegistrationEvaluation` (avaliações)
- `MapasCulturais\Entities\File` (arquivos anexados)
- `entity_revision` (revisões de entidades)

## 4. Plugins ativados

Os plugins ativados na instância estão configurados em `docker/common/config.d/plugins.php`:

- `MultipleLocalAuth`
- `AdminLoginAsUser`
- `Analytics`
- `Accessibility`
- `SpamDetector`
- `ValuersManagement`
- `SettingsES`
- `Zammad`
- `MapasBlame`

## 5. Infraestrutura de produção

O `docker-compose.prod.yml` define:

- `nginx` (proxy estático + TLS)
- `mapasculturais` (PHP-FPM)
- `db` (`postgis/postgis:16-master`)
- `redis` e `sessions` (cache e sessões)
- `certbot` (renovação automática de TLS)

## 6. Decisões técnicas relevantes

As decisões com consequência duradoura estão registradas como ADRs em `docs/decisions/adr/`:

- ADR-0001 — Manter dois temas durante a transição.
- ADR-0002 — Codificar IDs de entidades diretamente no código PHP.
- ADR-0003 — Implementar relatórios administrativos via controller customizado no plugin.

## 7. Dependências externas

<!-- TODO: listar dependências críticas (Mapas Culturais core, banco PostGIS, Redis, etc.). -->
