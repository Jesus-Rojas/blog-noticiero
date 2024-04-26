import { News } from "../components/News";

export function TopHeadlines() {
  return (
    <section className="px-2 pt-5">
      <h1 className="text-center">From Top Headlines</h1>

      <News />
    </section>
  );
}