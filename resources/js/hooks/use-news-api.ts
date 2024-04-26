import { Article } from "../types/article.interface";
import { Pagination } from "../types/pagination.interface";

export function useNewsApi() {
  const baseUrl = import.meta.env.VITE_APP_URL + '/api';

  const getNewsWithPagination = async () => {
    const response = await fetch(baseUrl + '/news');
    return response.json() as Promise<Pagination<Article>>;
  }

  return {
    getNewsWithPagination,
  }
}