import { useEffect, useState } from "react";
import { Article } from "../types/article.interface";
import { useNewsApi } from "./use-news-api";

export function useNews() {
  const [news, setNews] = useState<Article[]>([]);
  const { getNewsWithPagination } = useNewsApi();

  useEffect(() => {
    getNewsWithPagination()
      .then(({ data }) => {
        setNews(data);
        console.log(data)
      })
      .catch(console.log);
  }, []);

  return {
    news,
  };
}
