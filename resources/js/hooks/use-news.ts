import { useEffect, useState } from "react";
import { Article } from "../types/article.interface";
import { Pagination } from "../types/pagination.interface";
import { useNewsApi } from "./use-news-api";

export function useNews() {
  const [news, setNews] = useState<Article[]>([]);
  const [newsPagination, setNewsPagination] = useState<Omit<Pagination<Article>, 'data'>>();
  const { getNewsWithPagination } = useNewsApi();

  const getDataOfPage = (url?: string) => {
    getNewsWithPagination(url)
      .then(({ data, ...pagination }) => {
        setNews(data);
        setNewsPagination(pagination);
        url && document.querySelector('body')!.scrollIntoView()
      })
      .catch(console.log);

  }

  useEffect(() => {
    getDataOfPage();
  }, []);

  return {
    news,
    newsPagination,
    getDataOfPage,
  };
}
