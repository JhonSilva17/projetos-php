# Validação de formulários com PHP

## Por que utilizar filtros?
Quase todos os aplicativos da Web são dependentes de insumos externos. Esses dados geralmente vêm de usuários ou outras aplicações (como os serviços web). Usando filtros, você pode garantir que as aplicações obter o tipo de entrada correta.

## Veja abaixo alguns desses filtros

**FILTER_INPUT**: Aplica filtros especiais nos dados recebidos através dos inputs. O seu primeiro parâmetro especifica o método HTTP que o dado foi envido; o segundo informa o name do input a ser verificado; e o terceiro aplica os filtros específicos.
* **FILTER_SANITIZE_SPECIAL_CHARS**: Filtra do valor recebido todos os caracteres especiais, serve para evitar qualquer tipo de injeção de códigos malisiosos atráves dos inputs.
* **FILTER_SANITIZE_EMAIL**: Verifica se o dado registrado pelo input é ou não um e-mail.
* **FILTER_SANITIZE_NUMBER_INT**: Verifica se o dado registrado é ou não um número inteiro.
* **FILTER_SANITIZE_NUMBER_FLOAT**: Verifica se o dado registrado é ou não um número decimal.