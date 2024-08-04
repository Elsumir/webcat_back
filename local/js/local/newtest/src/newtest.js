import { BitrixVue } from 'ui.vue3';
import { Dom, Loc } from 'main.core';

import { TaskManger } from './components/task-manager';

export class Newtest {
  #application;

  constructor(rootNode): void {
    this.rootNode = document.querySelector(rootNode);
  }

  start(): void {
    // console.log(BX.Vue3.createApp);
    this.attachTemplate();
  }

  attachTemplate(): void {
    this.#application = BX.Vue3.createApp({
      name: 'TaskManager',
      components: {
        TaskManger,
      },

      template: '<TaskManger/>',
    });
    this.#application.use(BX.Vue3.BitrixVue);
    this.#application.mount(this.rootNode);
  }
}
