/// <reference types="vite/client" />

interface ImportMeta {
  readonly env: {
    [key: string]: string | boolean | undefined;
    readonly MODE: string;
    readonly BASE_URL: string;
    readonly PROD: boolean;
    readonly DEV: boolean;
  }
}