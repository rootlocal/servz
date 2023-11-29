GIT = $$(which git)
COMPOSER = $$(which composer)
RM ?= rm -f
FETCH = $$(which fetch)
PHP = $$(which php)
NPM = $$(which npm)
GULP = $$(which gulp)
COMPOSER_FLAGS = --no-dev
YII = $(PHP) ./yii

.PHONY: all clean

all:
	@echo "*** run target all ***"

init-prod: composer-update-prod
	@echo "*** run init-prod ***"
	$(PHP) ./init --env=Production --overwrite=No

init-dev: composer-update-dev
	@echo "*** run init-dev ***"
	$(PHP) ./init init --env=Development --overwrite=No

clean: assets-clean runtime-clean
	@echo "*** run clean ***"

assets-clean:
	@echo "*** run assets-clean ***"
	-$(RM) -r frontend/web/assets/*
	-$(RM) -r backend/web/assets/*

runtime-clean:
	@echo "*** run runtime-clean ***"
	-$(RM) -r ./frontend/runtime/*
	-$(RM) -r ./backend/runtime/*

git-pull:
	@echo "*** run target git-pull ***"
	@$(GIT) --version
	-$(GIT) checkout master > /dev/null 2>&1
	-$(GIT) pull --all

composer-update-dev:
	@echo "*** run target composer-update ***"
	-COMPOSER_MEMORY_LIMIT=-1 $(COMPOSER) update

composer-update-prod:
	@echo "*** run target composer-update ***"
	-COMPOSER_MEMORY_LIMIT=-1 $(COMPOSER) $(COMPOSER_FLAGS) update

yii-migrate:
	@echo "*** run yii-migrate ***"
	-$(YII) migrate --interactive=0 up

update: git-pull composer-update-prod yii-migrate
	@echo " *** run deploy ***"

serve-frontend:
	@echo "*** run serve-frontend ***"
	-@$(PHP) -v
	-$(YII) serve -t=@frontend/web -p 8083

serve-backend:
	@echo "*** run serve-backend ***"
	-@$(PHP) -v
	-$(YII) serve -t=@backend/web -p 8082
